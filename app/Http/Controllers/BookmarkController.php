<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Toggle bookmark status for the given post.
     */
    public function toggle(Request $request, Post $post)
    {
        $user = auth()->user();
        
        $bookmarked = $user->bookmarks()->toggle($post->id);
        
        $isBookmarked = count($bookmarked['attached']) > 0;
        
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'bookmarked' => $isBookmarked,
            ]);
        }

        return back()->with('status', $isBookmarked ? 'Post bookmarked.' : 'Post removed from bookmarks.');
    }
}
