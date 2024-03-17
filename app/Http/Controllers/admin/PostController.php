<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function store(PostRequest $request)
    {

        // Validate the incoming request
        $validatedData = $request->validated();

        // Upload thumbnail image
        $thumbnailPath = $request->file('thumbnail')->store('public/thumbnail');
        $validatedData['thumbnail'] = $thumbnailPath;

        // Generate slug
        $validatedData['slug'] = Str::slug($request->title);

        // Set user ID
        $validatedData['user_id'] = auth()->id();

        // Create the post
        $post = Post::create($validatedData);

        // Create SEO data for the post
        $seoData = [
            'title' => $request->title,
            'description' => Str::limit(strip_tags($post->content), 120, '...'),
            'author' => $post->user_id,
            'robots' => 'index, follow',
            'canonical_url' => $post->slug,
        ];

        // Associate SEO data with the post
        $post->seo()->create($seoData);

        // Redirect based on user role
        $redirectRoute = auth()->user()->role == 'Admin' ? '/admin/posts/' : '/writer/posts/';

        return redirect($redirectRoute . $post->id)->with('success', 'Proses Berhasil Dilakukan 😁!');
    }


    public function update($id, PostRequest $request)
    {
        $validate_data = $request->validated();
        $post = Post::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            // thumbnail  image
            Storage::delete($post->thumbnail);
            $request->file('thumbnail')->getClientOriginalName();
            $validate_data['thumbnail'] = $request->file('thumbnail')->store('public/thumbnail');
        }

        //slug and author
        $validate_data['slug'] = Str::slug($request->title);
        $validate_data['user_id'] = auth()->user()->id;

        $post->update($validate_data);

        $seoData = [
            'title' => $request->title,
            'description' => Str::limit(strip_tags($post->content), 120, '...'),
            'author' => $post->user_id,
            'robots' => 'index, follow',
            'canonical_url' => $post->slug,
        ];

        // Associate SEO data with the post
        $post->seo()->update($seoData);

        // Redirect based on user role

        $redirectRoute = auth()->user()->role == 'Penulis' ? '/writer/posts/' : '/writer/posts/';

        return redirect($redirectRoute . $post->id)->with('success', 'Proses Berhasil Dilakukan 😁!');
    }
}
