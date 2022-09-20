<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostCreateRequest;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    public function handle(PostCreateRequest $request)
    {
        $input = $request->only('title', 'description', 'body');

        $input['author_id'] = auth()->user()->id ?? null;

        $this->blogRepository->create($input);

        return redirect('/')->with('status', 'Blog Created!');

    }
}
