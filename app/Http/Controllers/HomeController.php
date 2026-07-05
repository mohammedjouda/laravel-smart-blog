<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // $featuredPost = Post::where('status', 'published')->when(auth()->check(), function ($query) {
        //     $query->where('user_id', '!=', auth()->id());
        // })
        //     ->orderBy('created_at', 'desc')
        //     ->first();

        // $posts = Post::where('status', 'published')->when(auth()->check(), function ($query) {
        //     $query->where('user_id', '!=', auth()->id());
        // })
        //     ->latest()
        //     ->limit(2)
        //     ->get();
        $categories = Category::whereHas('posts', function ($query) {
            $query->where('status', 'published');
        })->get();

        return view('home', compact('categories'));
    }

}
