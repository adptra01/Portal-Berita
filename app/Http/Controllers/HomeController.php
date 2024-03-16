<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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

        $labels = [];
        $dataset = [];

        foreach ($top10Post as $post) {
            $labels[] = $post->title;
            $dataset[] = $post->viewer;
        }

        $chartTopViewerPost = (new LarapexChart)->setType('bar')
            ->setTitle('Top 10 Post Dilihat (Total)')
            ->setLabels($labels)
            ->setDataset([
                [
                    'name' => 'Viewer',
                    'data' => $dataset
                ]
            ]);
        // end top10Post


        return view('pages.home', compact('countPost', 'writerCountPost', 'chartPost', 'chartTopViewerPost', 'countPostsWriter', 'countAdvertsByPosition'));
    }
}
