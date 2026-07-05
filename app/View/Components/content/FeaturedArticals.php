<?php

namespace App\View\Components\content;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedArticals extends Component
{
    /**
     * Create a new component instance.
     */
    public $featuredPost;
    public function __construct(Post $featuredPost)
    {
        $featuredPost = Post::with(['user', 'category', 'tags'])
            ->where('status', 'published')
            ->when(auth()->check(), function ($query) {
                $query->where('user_id', '!=', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->first();
        $this->featuredPost = $featuredPost;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content.featured-articals');
    }
}
