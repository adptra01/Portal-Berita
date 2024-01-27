<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index');
    }
    public function create()
    {
        return view('admin.post.create', [
            'categories' => Category::get(),
            'statuses' => Status::get(),
        ]);
    }
    public function store(PostRequest $request)
    {

        $validate_data = $request->validated();

        // thumbnail  image
        $request->file('thumbnail')->getClientOriginalName();
        $validate_data['thumbnail'] = $request->file('thumbnail')->store('public/thumbnail');

        //slug and author
        $validate_data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $validate_data['user_id'] = auth()->user()->id;

        // save the validation data
        Post::create($validate_data);

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
    }
    public function update($id, Request $request)
    {
    }
}
