<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.article.index');
    }
    public function create()
    {
        return view('admin.article.create', [
            'categories' => Category::get(),
            'statuses' => Status::get(),
        ]);
    }
    public function store(ArticleRequest $request)
    {
        // dd($request->all());
        // 'title',
        // 'thumbnail',
        // 'slug',
        // 'content',
        // 'category_id',
        // 'status_id',
        // 'user_id',

        $validate_data = $request->validated();
        $validate_data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $validate_data['user_id'] = auth()->user()->id;

        Article::create($validate_data);
    }
}
