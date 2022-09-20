<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\GetUpdateRequest;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    public function handle(GetUpdateRequest $request, $id)
    {
        return view('blogs.view')->with([
            'blog' => $this->blogRepository->findById($id, ['*'], ['comments.replies', 'author']),
        ]);
    }
}
