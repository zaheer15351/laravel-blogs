<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetCreateController extends Controller
{
    public function handle()
    {
        return view('blogs.create');
    }
}
