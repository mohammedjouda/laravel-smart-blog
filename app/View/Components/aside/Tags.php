<?php

namespace App\View\Components\Aside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tags extends Component
{
    public $tags;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tags = \App\Models\Tag::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.aside.tags');
    }
}
