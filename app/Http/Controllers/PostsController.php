<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
      public function index()
      {
        $catePosts = Http::get('http://127.0.0.1:3000/api/allCatePosts');
        $catePosts = json_decode($catePosts);
        return view('posts.all',compact('catePosts'));
      }

      public function cate_posts()
      {
        return view('posts.cate-post');
      }
}
