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

        $validate_data = $request->validated();

        // thumbnail  image
        $request->file('thumbnail')->getClientOriginalName();
        $validate_data['thumbnail'] = $request->file('thumbnail')->store('public/thumbnail');

        //slug and author
        $validate_data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $validate_data['user_id'] = auth()->user()->id;

        // save the validation data
        Article::create($validate_data);

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {

    }
    public function update($id, Request $request)
    {

    }
}
