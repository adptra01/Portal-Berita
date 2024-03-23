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
        $countPost =  Post::count(); // total post keseluruhan

        $writerCountPost = Post::where('user_id', auth()->user()->id)->count(); // total post ari penulis login

        $countPostsWriter = User::with('posts')->where('role', 'Penulis')->get(); // total post per-penulis

        $adverts = Advert::all();
        $advertsByPosition = $adverts->groupBy('position');
        $countAdvertsByPosition = [];
        foreach ($advertsByPosition as $position => $adverts) {
            $countAdvertsByPosition[$position] = $adverts->count();
        }


        // start chartPost
        $postCountPerCategory = Post::select('category_id', DB::raw('count(*) as post_count'))
            ->groupBy('category_id')
            ->get();
        $labels = [];
        $dataset = [];

        foreach ($postCountPerCategory as $data) {
            $labels[] = $data->category->name; // Ganti 'category->name' sesuai relationship model Anda
            $dataset[] = $data->post_count;
        }

        $chartPost = (new LarapexChart)->setTitle('Jumlah Post Per Kategori')
            ->setDataset($dataset)
            ->setLabels($labels);
        // end chartPost

        // start top10Post
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
        // end top10Post

        $roles = ['Penulis', 'Admin', 'Pengunjung'];

        $userCountByRole = User::whereIn('role', $roles)
            ->select('role', DB::raw('count(*) as total_user'))
            ->groupBy('role')
            ->get();

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

        // Menghitung jumlah pengunjung hari ini
        $visitorCountToday = Visitor::whereDate('created_at', Carbon::today())->count();

        // Menghitung jumlah pengunjung bulan ini
        $visitorCountThisMonth = Visitor::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        // Menghitung jumlah pengunjung tahun ini
        $visitorCountThisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();

        // Menghitung jumlah pengunjung keseluruhan
        $visitorCountAll = Visitor::count();


        return view('pages.home',
        compact(
            'countPost',
            'writerCountPost',
            'chartPost',
            'chartTopViewerPost',
            'countPostsWriter',
            'countAdvertsByPosition',
            'chartTotalUser',
            'visitorCountToday',
            'visitorCountThisMonth',
            'visitorCountThisYear',
            'visitorCountAll'
        ));
    }
}
