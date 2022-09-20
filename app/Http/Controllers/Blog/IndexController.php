<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    public function handle()
    {
        return view('blogs.index')->with([
           'blogs' => $this->blogRepository->all(['*'], ['author'])->orderBy('id', 'desc')->get(),
        ]);
    }
}
