<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the authors.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $authors = User::withCount([
            'posts' => function ($q) {
                $q->where('status', 'published');
            },
            'followers',
            'followed'
        ])
            ->whereKeyNot(auth()->id())
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%")
                        ->orWhere('bio', 'like', "%{$search}%")
                        ->orWhere('field', 'like', "%{$search}%");
                });
            })
            ->paginate(12)
            ->withQueryString();

        $followedIds = [];
        $followerIds = [];
        if (auth()->check()) {
            $followedIds = auth()->user()->followed()->pluck('users.id')->toArray();
            $followerIds = auth()->user()->followers()->pluck('users.id')->toArray();
        }

        return view('authors', compact('authors', 'followedIds', 'followerIds'));
    }
}
