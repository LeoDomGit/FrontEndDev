<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
      public function index()
      {
        return view('posts.all');
      }

      public function cate_posts()
      {
        return view('posts.cate-post');
      }
}
