<?php

namespace App\View\Components\Aside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class WriterFollow extends Component
{
    public $users;
    public $followedIds = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->users = User::query()
            ->when(auth()->check(), function ($query) {
                $query->whereKeyNot(auth()->id());
            })
            ->inRandomOrder() // mix it up to keep it fresh
            ->limit(3)
            ->get();

        if (auth()->check()) {
            $this->followedIds = auth()->user()->followed()->pluck('users.id')->toArray();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.aside.writer-follow');
    }
}
