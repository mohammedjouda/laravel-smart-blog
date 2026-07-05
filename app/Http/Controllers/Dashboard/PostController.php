<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $allowedStatuses = ['draft', 'published', 'archived'];

        $posts = $request->user()
            ->posts()
            ->with(['category', 'user'])
            ->when(in_array($status, $allowedStatuses, true), fn ($query) => $query->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $statusOptions = collect($allowedStatuses)
            ->map(fn (string $value) => [
                'name' => ucfirst($value),
                'value' => $value,
                'count' => $request->user()->posts()->where('status', $value)->count(),
            ]);

        return view('dashboard.posts.index', [
            'posts' => $posts,
            'status' => $status,
            'statusOptions' => $statusOptions,
            'totalPosts' => $request->user()->posts()->count(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.posts.create', [
            'post' => new Post(['status' => 'draft']),
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $tags = $request->input('tags');

        $post = $request->user()->posts()->create($data);

        if ($tags) {
            $this->syncTags($post, $tags);
        }

        return redirect()
            ->route('dashboard.posts.show', $post)
            ->with('status', 'Post created.');
    }

    public function publicShow(Post $post): View
    {
        abort_unless($post->status === 'published', 404);

        $post->increment('views');
        $post->load(['category', 'user', 'tags']);

        $isFollowing = false;
        if (auth()->check() && auth()->id() !== $post->user_id) {
            $isFollowing = auth()->user()->followed()->where('followed_id', $post->user_id)->exists();
        }

        $suggestions = Post::with(['category', 'user'])
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('single-post', [
            'post' => $post,
            'publicView' => true,
            'isFollowing' => $isFollowing,
            'suggestions' => $suggestions,
        ]);
    }
    public function singlePost(Post $post){
        dd($post);
    }

    public function show(Post $post): View
    {
        $this->authorizeOwner($post);

        return view('dashboard.posts.show', [
            'post' => $post->load(['category', 'user']),
            'publicView' => false,
        ]);
    }

    public function edit(Post $post): View
    {
        $this->authorizeOwner($post);

        return view('dashboard.posts.edit', [
            'post' => $post->load('tags'),
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorizeOwner($post);

        $post->update($this->validatedData($request, $post));
        
        $this->syncTags($post, $request->input('tags'));

        return redirect()
            ->route('dashboard.posts.show', $post)
            ->with('status', 'Post updated.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $this->authorizeOwner($post);

        $post->delete();

        return redirect()
            ->route('dashboard.posts.index')
            ->with('status', 'Post deleted.');
    }

    private function validatedData(Request $request, ?Post $post = null): array
    {
        $data = $request->validate([
            'category_id' => ['nullable', 'integer', Rule::exists('categories', 'id')],
            'title' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($post),
            ],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
            'tags' => ['nullable', 'string'],
        ]);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?? $data['title'], $post);

        if ($request->input('delete_cover_image') === '1') {
            if ($post && $post->cover_image && !\Illuminate\Support\Str::startsWith($post->cover_image, ['http://', 'https://'])) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->cover_image);
            }
            $data['cover_image'] = null;
        } elseif ($request->hasFile('cover_image')) {
            if ($post && $post->cover_image && !\Illuminate\Support\Str::startsWith($post->cover_image, ['http://', 'https://'])) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        } elseif ($post) {
            $data['cover_image'] = $post->cover_image;
        } else {
            $data['cover_image'] = null;
        }

        return $data;
    }

    private function uniqueSlug(string $value, ?Post $post = null): string
    {
        $base = Str::slug($value) ?: 'post';
        $slug = $base;
        $suffix = 1;

        while (Post::query()
            ->where('slug', $slug)
            ->when($post, fn ($query) => $query->whereKeyNot($post->getKey()))
            ->exists()) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function authorizeOwner(Post $post): void
    {
        abort_unless((int) $post->user_id === (int) Auth::id(), 403);
    }

    private function syncTags(Post $post, ?string $tagsString): void
    {
        if (empty($tagsString)) {
            $post->tags()->detach();
            return;
        }

        $tagNames = collect(explode(',', $tagsString))
            ->map(fn($t) => trim($t))
            ->filter()
            ->unique();

        $tagIds = $tagNames->map(function ($name) {
            return \App\Models\Tag::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            )->id;
        });

        $post->tags()->sync($tagIds);
    }
}
