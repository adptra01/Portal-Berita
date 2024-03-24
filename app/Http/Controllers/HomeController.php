<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

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
        $countPost = Cache::remember('post_count', 60, function () {
            return Post::count();
        });

        $writerCountPost = Post::where('user_id', auth()->user()->id)->count();

        $countPostsWriter = Cache::remember('count_posts_writer', 60, function () {
            return User::with('posts')->where('role', 'Penulis')->get();
        });

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

        $postCountPerCategory = Cache::remember('post_count_per_category', 60, function () {
            return Post::select('category_id', DB::raw('count(*) as post_count'))
                ->groupBy('category_id')
                ->get();
        });

        $labelsPost = [];
        $datasetPost = [];
        foreach ($postCountPerCategory as $data) {
            $labelsPost[] = $data->category->name;
            $datasetPost[] = $data->post_count;
        }
        $chartPost = (new LarapexChart)->setTitle('Jumlah Post Per Kategori')
            ->setDataset($datasetPost)
            ->setLabels($labelsPost);



        $top10Post = Post::orderBy('viewer', 'desc')
            ->limit(10)->get();
        $labelstop10Post = [];
        $datasettop10Post = [];
        foreach ($top10Post as $post) {
            $labelstop10Post[] = $post->title;
            $datasettop10Post[] = $post->viewer;
        }
        $chartTopViewerPost = (new LarapexChart)->setType('bar')
            ->setTitle('Top 10 Post Dilihat (Total)')
            ->setLabels($labelstop10Post)
            ->setDataset([
                [
                    'name' => 'Viewer',
                    'data' => $datasettop10Post
                ]
            ]);



        $userCountByRole = Cache::remember('user_count_by_role', 60, function () {
            return User::select('role', DB::raw('count(*) as total_user'))
                ->whereIn('role', ['Penulis', 'Admin', 'Pengunjung'])
                ->groupBy('role')
                ->get();
        });

        $labels = [];
        $dataset = [];
        foreach ($userCountByRole as $data) {
            $labels[] = $data->role;
            $dataset[] = $data->total_user;
        }
        $chartTotalUser = (new LarapexChart)->setType('bar')
            ->setTitle('Total User Berdasarkan Role')
            ->setLabels($labels)
            ->setDataset([
                [
                    'name' => 'Total User',
                    'data' => $dataset
                ]
            ]);


        $visitorCountToday = Visitor::whereDate('created_at', Carbon::today())->count();

        $visitorCountThisWeek = Visitor::where('created_at', '>=', Carbon::now()->startOfWeek())
            ->where('created_at', '<=', Carbon::now()->endOfWeek())
            ->count();

        $visitorCountThisMonth = Visitor::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $visitorCountThisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();

        $visitorCountAll = Visitor::count();

        $advertsCount = Advert::select('position', DB::raw('count(*) as position_count'))
            ->groupBy('position')
            ->get();

        $labelsAdvert = [];
        $datasetAdvert = [];

        foreach ($advertsCount as $data) {
            $labelsAdvert[] = $data->position;
            $datasetAdvert[] = $data->position_count;
        }
        $chartAdvertsByPosition = (new LarapexChart)->setTitle('Jumlah Iklan Per Kategori')
            ->setDataset($datasetAdvert)
            ->setLabels($labelsAdvert);


        return view(
            'pages.home',
            compact(
                'countPost',
                'writerCountPost',
                'chartPost',
                'chartTopViewerPost',
                'chartPostsWriter',
                'chartTotalUser',
                'visitorCountToday',
                'visitorCountThisMonth',
                'visitorCountThisYear',
                'visitorCountAll',
                'chartAdvertsByPosition',
                'visitorCountThisWeek',
            )
        );
    }
}
