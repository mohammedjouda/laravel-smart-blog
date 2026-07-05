<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the specified profile.
     */
    public function show(User $user = null)
    {
        $user = $user ?? auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $user->loadCount([
            'followers',
            'followed',
            'posts' => function ($q) {
                $q->where('status', 'published');
            }
        ]);

        $posts = $user->posts()
            ->with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->latest()
            ->get();

        $isFollowing = false;
        $isFollower = false;
        if (auth()->check() && auth()->id() !== $user->id) {
            $isFollowing = auth()->user()->followed()->where('followed_id', $user->id)->exists();
            $isFollower = auth()->user()->followers()->where('follower_id', $user->id)->exists();
        }

        return view('profile', compact('user', 'posts', 'isFollowing', 'isFollower'));
    }
}
