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
        // С пагинацией
        $paginator = Post::orderBy('id', 'desc')->paginate(6); // 10 постов на страницу

        // Преобразуем посты в ресурс
        $posts = PostResource::collection($paginator);


        return inertia('Post/Index', [
            'posts' => [
                'data' => $posts,
                'current_page' => $paginator->currentPage(),
                'next_page_url' => $paginator->nextPageUrl(),
                'prev_page_url' => $paginator->previousPageUrl(),
                'last_page' => $paginator->lastPage(),
                'total' => $paginator->total(),
                'per_page' => $paginator->perPage(), // Добавляем количество элементов на страницу
                'links' => $paginator->linkCollection(), // Генерируем ссылки для пагинации
            ],
        ]);

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
