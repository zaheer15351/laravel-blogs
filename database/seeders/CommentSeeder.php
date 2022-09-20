<?php

namespace Database\Seeders;

use App\Repositories\Comment\CommentRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{

    private CommentRepository $commentRepository;

    public function __construct(
        CommentRepository $commentRepository
    )
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->commentRepository->getFactory()
            ->count(10)
            ->create();
    }
}
