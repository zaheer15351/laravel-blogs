<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    private CommentRepository $commentRepository;

    public function __construct(
        CommentRepository $commentRepository
    )
    {
        $this->commentRepository = $commentRepository;
    }

    public function handle(Request $request) // TODO: make a request class
    {
        $input = $request->all();

        $request->validate([
            'body'=>'required',
        ]);

        $input['author_id'] = auth()->user()->id ?? null;

        $this->commentRepository->create($input);

        return back();
    }
}
