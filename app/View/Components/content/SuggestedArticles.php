<?php

namespace App\View\Components\content;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SuggestedArticles extends Component
{
    /**
     * Create a new component instance.
     */
    public $posts;
    public function __construct()
    {
        $search = request('search');
        $posts = Post::with(['user', 'category', 'tags'])
            ->where('status', 'published')
            ->when(auth()->check(), function ($query) {
                $query->where('user_id', '!=', auth()->id());
            })
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhereHas('category', function ($catQuery) use ($search) {
                            $catQuery->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('tags', function ($tagQuery) use ($search) {
                            $tagQuery->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', "%{$search}%")
                                     ->orWhere('username', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->limit(10)
            ->get();

        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content.suggested-articles');
    }
}
