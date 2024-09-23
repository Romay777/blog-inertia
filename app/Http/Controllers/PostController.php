<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        // Без пагинации
        /*$posts = Post::all();

        $posts = PostResource::collection($posts)->resolve();

        return inertia('Post/Index', compact('posts'));*/


        // С пагинацией
        $posts = Post::paginate(4);

        $posts = PostResource::collection($posts)->resolve();

        return inertia('Post/Index', compact('posts'));

    }

    public function create()
    {
        return inertia('Post/Create');
    }

    public function show(Post $post)
    {
        return inertia('Post/Show', compact('post'));
    }

    public function edit(Post $post)
    {
        return inertia('Post/Edit', compact('post'));
    }

    public function store(StoreRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('post.index');
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('post.index');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
