<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
  public function index()
  {
    $catePosts = Http::get('http://127.0.0.1:3000/api/allCatePosts');
    $allPosts = Http::get('http://127.0.0.1:3000/api/allPosts');
    $trash = Http::get('http://127.0.0.1:3000/api/trashPosts');
    $catePosts = json_decode($catePosts);
    $allPosts = json_decode($allPosts);
    $trash = json_decode($trash);
    return view('posts.all', compact('catePosts', 'allPosts','trash'));
  }

  public function index_cate_posts()
  {
    $allCatePost = Http::get('http://127.0.0.1:3000/api/allCatepost');
    $allCatePost = json_decode($allCatePost);
    return view('posts.cate-post',compact('allCatePost'));
  }
}
