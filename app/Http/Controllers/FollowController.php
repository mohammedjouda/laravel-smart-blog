<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Follow the given user.
     */
    public function follow(Request $request, User $user)
    {
        if (auth()->id() === $user->id) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'You cannot follow yourself.'], 422);
            }
            return back()->with('error', 'You cannot follow yourself.');
        }

        // syncWithoutDetaching prevents duplicate follows
        auth()->user()->followed()->syncWithoutDetaching([$user->id]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "You are now following {$user->name}.",
                'followers_count' => $user->followers()->count(),
            ]);
        }

        return back()->with('status', "You are now following {$user->name}.");
    }

    /**
     * Unfollow the given user.
     */
    public function unfollow(Request $request, User $user)
    {
        auth()->user()->followed()->detach($user->id);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "You have unfollowed {$user->name}.",
                'followers_count' => $user->followers()->count(),
            ]);
        }

        return back()->with('status', "You have unfollowed {$user->name}.");
    }
}
