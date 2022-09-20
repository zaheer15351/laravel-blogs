<?php

namespace App\Repositories\Comment;
use App\Models\Comment;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    public function __construct(
        Comment $model
    )
    {
        parent::__construct($model);
    }

}
