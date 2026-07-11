<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Toggle like status for the given post.
     */
    public function toggle(Request $request, Post $post)
    {
        $user = auth()->user();
        
        $liked = $user->likes()->toggle($post->id);
        
        // toggle returns an array like ['attached' => [id], 'detached' => [id]]
        $isLiked = count($liked['attached']) > 0;
        
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'liked' => $isLiked,
                'likes_count' => $post->likes()->count(),
            ]);
        }

        return back()->with('status', $isLiked ? 'Post liked.' : 'Post unliked.');
    }
}
