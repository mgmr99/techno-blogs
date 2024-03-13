<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index',[
            'categories'=> Category::whereHas('posts',function ($query){
                $query->published();
            })->get(),
        ]);
    }
}
