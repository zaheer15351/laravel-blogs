<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\DeleteRequest;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    public function handle(DeleteRequest $request, $id)
    {
        dd($id);
        if ($this->blogRepository->deleteById($id)) {
            $message = 'Deleted!';
        } else {
            $message = 'Not found!';
        }
        return redirect('/')->with('status', $message);
    }
}
