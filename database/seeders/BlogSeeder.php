<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{

    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->blogRepository->getFactory()
            ->count(10)
            ->create();
    }
}
