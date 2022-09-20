<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostCreateRequest;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;

class PostUpdateController extends Controller
{
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    public function handle(PostCreateRequest $request, $id)
    {
        $input = $request->only('title', 'description', 'body');

        $request->validate([
            'body'=>'required',
        ]);

        $this->blogRepository->updateWithCondition(['id' => $id], $input);

        return redirect('/')->with('status', 'Blog updated!');

    }
}
