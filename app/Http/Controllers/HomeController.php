<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->id();
        $countPost = Post::count();
        $writerCountPost = Post::where('user_id', $userId)->count();

        $countPostsWriter = User::with('posts')->where('role', 'Penulis')->get();
        $labels = [];
        $dataset = [];
        foreach ($countPostsWriter as $data) {
            $labels[] = $data->name;
            $dataset[] = $data->posts->count();
        }

        $chartPostsWriter = (new LarapexChart)->areaChart()
            ->setTitle('Jumlah Post Per Penulis')
            ->setSubtitle('Grafik area menampilkan jumlah post yang diposting oleh setiap penulis.')
            ->addData('Jumlah Post', $dataset)
            ->setXAxis($labels);

        $postCountPerCategory = Post::with('category')->select('category_id', DB::raw('count(*) as post_count'))
            ->groupBy('category_id')
            ->get();

        $chartPost = (new LarapexChart)->setTitle('Jumlah Post Per Kategori')
            ->setDataset($postCountPerCategory->pluck('post_count')->toArray())
            ->setLabels($postCountPerCategory->pluck('category.name')->toArray());

        $top10Post = Post::orderBy('viewer', 'desc')->take(10)->get();

        $chartTopViewerPost = (new LarapexChart)->setType('bar')
            ->setTitle('Top 10 Post Dilihat (Total)')
            ->setLabels($top10Post->pluck('title')->toArray())
            ->setDataset([
                [
                    'name' => 'Viewer',
                    'data' => $top10Post->pluck('viewer')->toArray()
                ]
            ]);

        $userCountByRole = User::select('role', DB::raw('count(*) as total_user'))
            ->whereIn('role', ['Penulis', 'Admin', 'Pengunjung'])
            ->groupBy('role')
            ->get();

        $chartTotalUser = (new LarapexChart)->setType('bar')
            ->setTitle('Total User Berdasarkan Role')
            ->setLabels($userCountByRole->pluck('role')->toArray())
            ->setDataset([
                [
                    'name' => 'Total User',
                    'data' => $userCountByRole->pluck('total_user')->toArray()
                ]
            ]);

        $visitorCounts = [
            'today' => Visitor::whereDate('created_at', Carbon::today())->count(),
            'thisWeek' => Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
            'thisMonth' => Visitor::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count(),
            'thisYear' => Visitor::whereYear('created_at', Carbon::now()->year)->count(),
            'all' => Visitor::count(),
        ];

        $advertsCount = Advert::select('position', DB::raw('count(*) as position_count'))
            ->groupBy('position')
            ->get();

        $chartAdvertsByPosition = (new LarapexChart)->setTitle('Jumlah Iklan Per Kategori')
            ->setDataset($advertsCount->pluck('position_count')->toArray())
            ->setLabels($advertsCount->pluck('position')->toArray());

        return view('pages.home', compact(
            'countPost',
            'writerCountPost',
            'chartPost',
            'chartTopViewerPost',
            'chartPostsWriter',
            'chartTotalUser',
            'chartAdvertsByPosition',
            'visitorCounts'
        ));
    }
}
