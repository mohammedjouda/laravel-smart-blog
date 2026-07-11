@props([
    'articles' => [
        [
            'title' => 'The Resurgence of Serif Fonts in High-Contrast Digital Interfaces',
            'published_at' => 'May 10, 2024',
            'content' => 'How modern
                high-resolution displays are bringing back the elegance of the serif, and why readability is
                the new luxury.',
            'author' => 'Elena Vance',
            'category' => 'Typography',
            'read_at' => '5 min read',
        ],
        [
            'title' => 'Curating Your Digital Canvas: A Guide to Focused Workspaces',
            'published_at' => 'May 08, 2024',
            'content' => 'Reducing cognitive
                load through environmental design. Learn how to strip away the non-essential from your
                workflow.',
            'author' => 'Marcus Chen',
            'category' => 'Productivity',
            'read_at' => '12 min read',
        ],
    ],
])


<!-- Left Feed Column -->
<div class="lg:col-span-8 flex flex-col gap-16">
    <!-- Articles -->
    @forelse ($posts as $post)
        <article class="grid grid-cols-1 md:grid-cols-[1fr_200px] gap-8 group cursor-pointer">
            <div class="flex flex-col gap-3" onclick="window.location.href='{{ route('posts.show', $post->slug) }}';">
                <div class="flex items-center gap-2 font-label-md text-[12px] text-on-surface-variant">
                    <img class="w-6 h-6 rounded-full object-cover"
                        alt="{{ $post->user->name }}"
                        src="{{ $post->user->avatar ? Storage::url($post->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&background=8b0e0f&color=fff' }}">
                    <span class="text-on-surface font-bold">{{ $post->user->name }}</span>
                    <span class="opacity-50">·</span>
                    <span>{{ $post->created_at->format('M j') }} </span>
                </div>
                <h2 class="font-headline-md text-headline-md group-hover:text-primary transition-colors">
                    {{ $post->title }}
                </h2>
                <p class="font-body-md text-on-surface-variant line-clamp-3">
                    {{ $post->excerpt }}
                </p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-4">
                        @if ($post->tags->isNotEmpty())
                            @foreach ($post->tags as $tag)
                                <span
                                    class="bg-surface-container-high px-3 py-1 rounded-full font-label-md text-[11px] text-on-surface-variant">#{{ $tag->name }}</span>
                            @endforeach
                        @endif
                        <span class="font-label-md text-[12px] text-on-surface-variant">14 min read</span>
                    @php 
                        $isBookmarked = auth()->check() && auth()->user()->bookmarks()->where('post_id', $post->id)->exists();
                    @endphp
                    <div class="flex items-center gap-4 text-on-surface-variant">
                        <span onclick="event.stopPropagation(); toggleBookmark(this, '{{ $post->slug }}')" data-bookmark-slug="{{ $post->slug }}"
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors cursor-pointer {{ $isBookmarked ? 'text-primary' : '' }}"
                            {!! $isBookmarked ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>bookmark</span>
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">more_horiz</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block w-full h-32 rounded-lg overflow-hidden bg-surface-container-low" onclick="window.location.href='{{ route('posts.show', $post->slug) }}';">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    alt="{{ $post->title }}"
                    src="{{ $post->cover_image ? (\Illuminate\Support\Str::startsWith($post->cover_image, ['http://', 'https://']) ? $post->cover_image : Storage::url($post->cover_image)) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAp3MTRME82olBmAI-cldQ9xtOe7loPxN1DVmwaQJTZDywtZyQM3YbRNOdlLhsX6s7HFSowanI3irF2ABs-qoI1TjH13yNaHxliX1vNLlqIDMNW5hbPZBM8cxfAwQrlbxNiHv1Ud7KoInvxJhXWMzMYG_Rs0Bg6C6H7JqTun0DZ7E3hs788_IczIi_E5C2A1CeAyt9F1ZpCvkvMFtvxqrY5xMk0UEqW1fl_v3s6UyD-d0P0sIba0vZRauSakJuNAeKt1PqHuGqwqok' }}">
            </div>
        </article>
    @empty
        <div class="py-12 flex flex-col items-center justify-center text-center">
            <span class="material-symbols-outlined text-6xl text-outline mb-4">search_off</span>
            <h3 class="font-headline-md text-headline-md text-on-surface mb-2">No articles found</h3>
            <p class="text-on-surface-variant font-body-md text-body-md max-w-md mx-auto">We couldn't find any articles matching "{{ request('search') }}". Try searching for different keywords.</p>
        </div>
    @endforelse
</div>
