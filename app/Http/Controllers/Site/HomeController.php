<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(12);
        $random_posts = Post::where('status', 'published')->inRandomOrder()->limit(3)->get();
        return view('site.home', compact('posts', 'random_posts'));
    }

    public function singlePost(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('site.single-post', compact('post'));
    }
}
