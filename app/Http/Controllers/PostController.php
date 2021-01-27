<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {
        $posts = $blog->posts()->get();
        $data = compact('blog', 'posts');
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
        return view('posts.create', [
            'blog' => $blog
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        /** @var Post $post */
        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = Auth::user()->id;
        $post->blog_id = $blog->id;
        $post->save();

        $post->blog()->associate($blog);
        $post->user()->associate(Auth::user());

        return redirect(route('blog_posts.list', ['blog' => $blog->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        /** @var Post $post */

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        $blog = \App\Models\Blog::find($post->blog_id);

        return redirect(route('blog_posts.list', ['blog' => $blog->id]));
    }

    public function storeUpd(Request $request,Blog $blog,Post $post)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        /** @var Post $post */

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return redirect(route('blog_posts.list', ['blog' => $blog->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $blog = \App\Models\Blog::find($post->blog_id);
        $post->delete();

        return redirect(route('blog_posts.list', ['blog' => $blog->id]));
    }
}
