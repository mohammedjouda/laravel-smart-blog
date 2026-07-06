@php
    $countries = [
        'US' => 'United States',
        'GB' => 'United Kingdom',
        'CA' => 'Canada',
        'AU' => 'Australia',
        'DE' => 'Germany',
        'FR' => 'France',
        'IN' => 'India',
        'EG' => 'Egypt',
        'SA' => 'Saudi Arabia',
        'AE' => 'United Arab Emirates',
    ];
@endphp

<x-layout.main-layout title="{{ $user->name }}'s Profile">
    <main class="max-w-container-max mx-auto px-margin-desktop py-12 md:py-16">
        <!-- Author Profile Header -->
        <header class="flex flex-col md:flex-row items-center md:items-start gap-12 mb-section-gap">
            <div class="relative">
                <div class="w-40 h-40 md:w-56 md:h-56 rounded-full overflow-hidden border border-outline-variant/20 shadow-sm">
                    <img class="w-full h-full object-cover" 
                         alt="{{ $user->name }}" 
                         src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=8b0e0f&color=fff' }}">
                </div>
            </div>
            <div class="flex-1 text-center md:text-left">
                <div class="flex flex-col md:flex-row md:items-baseline md:justify-between mb-4 gap-4">
                    <div>
                        <h1 class="font-headline-lg text-headline-lg md:text-display-lg text-on-surface">
                            {{ $user->name }}
                        </h1>
                        <div class="flex items-center gap-2 mt-1 justify-center md:justify-start">
                            <span class="text-sm font-normal text-on-surface-variant">@ {{ $user->username }}</span>
                            @auth
                                @if ($isFollower)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-surface-container-high text-on-surface-variant">
                                        Follows you
                                    </span>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="flex gap-4 justify-center md:justify-start items-center">
                        @auth
                            @if (auth()->id() === $user->id)
                                <a href="{{ route('dashboard.posts.index') }}" class="bg-primary text-on-primary px-8 py-2 rounded-full font-label-md text-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px]">dashboard</span>
                                    Manage Posts
                                </a>
                            @else
                                @if ($isFollowing)
                                    <form action="{{ route('unfollow', $user->username) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="border border-primary text-primary px-8 py-2 rounded-full font-label-md text-label-md hover:bg-surface-container transition-colors">
                                            Unfollow
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', $user->username) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-primary text-on-primary px-8 py-2 rounded-full font-label-md text-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity">
                                            Follow
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @else
                            <form action="{{ route('follow', $user->username) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-primary text-on-primary px-8 py-2 rounded-full font-label-md text-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity">
                                    Follow
                                </button>
                            </form>
                        @endauth
                        
                        <a href="mailto:{{ $user->email }}" class="border border-outline px-4 py-2 rounded-full hover:bg-surface-container transition-colors flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-surface-variant">mail</span>
                        </a>
                    </div>
                </div>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mb-6">
                    {{ $user->bio ?? 'This writer has not written a bio yet.' }}
                </p>
                <div class="flex flex-wrap justify-center md:justify-start items-center gap-6 text-on-surface-variant">
                    <div class="flex items-center gap-2 font-label-md text-label-md uppercase tracking-wider">
                        <span class="text-on-surface font-bold">{{ $user->followers_count }}</span> Followers
                    </div>
                    <div class="flex items-center gap-2 font-label-md text-label-md uppercase tracking-wider">
                        <span class="text-on-surface font-bold">{{ $user->posts_count }}</span> Articles
                    </div>
                </div>
            </div>
        </header>
        <!-- Profile Tabs -->
        <div class="flex border-b border-outline-variant/30 mb-12">
            <button id="tab-btn-published" class="px-6 py-4 font-label-md text-label-md text-primary border-b-2 border-primary font-bold">Published</button>
            <button id="tab-btn-about" class="px-6 py-4 font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors">About</button>
            <button id="tab-btn-reading" class="px-6 py-4 font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors">Reading List</button>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Feed Column -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Published Articles Content -->
                <div id="content-published" class="space-y-12">
                    @forelse ($posts as $post)
                        <article class="group">
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <div class="flex-1 order-2 md:order-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">{{ $post->category?->name ?? 'Article' }}</span>
                                        <span class="text-outline-variant">•</span>
                                        <span class="font-label-md text-label-md text-on-surface-variant">{{ $post->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <h3 class="font-headline-md text-headline-md mb-3 group-hover:text-primary transition-colors">
                                        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-3">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 200) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4">
                                            @if ($post->tags->isNotEmpty())
                                                @foreach ($post->tags as $tag)
                                                    <span class="bg-surface-container-high px-3 py-1 rounded-full text-label-md font-label-md text-on-surface-variant">#{{ $tag->name }}</span>
                                                @endforeach
                                            @endif
                                            <span class="font-label-md text-label-md text-on-surface-variant flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[14px]">auto_stories</span> 
                                                {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} min read
                                            </span>
                                        </div>
                                        <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer" data-icon="bookmark">bookmark</span>
                                    </div>
                                </div>
                                @if ($post->cover_image)
                                    <div class="w-full md:w-48 h-48 md:h-32 rounded-lg overflow-hidden order-1 md:order-2 bg-surface-container shadow-sm">
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                             alt="{{ $post->title }}" 
                                             src="{{ \Illuminate\Support\Str::startsWith($post->cover_image, ['http://', 'https://']) ? $post->cover_image : Storage::url($post->cover_image) }}">
                                    </div>
                                @endif
                            </div>
                        </article>
                        @if (!$loop->last)
                            <div class="h-[1px] bg-outline-variant/30"></div>
                        @endif
                    @empty
                        <div class="text-center py-12 bg-surface-container-low p-8 rounded-xl">
                            <span class="material-symbols-outlined text-4xl text-outline mb-2">article</span>
                            <p class="text-on-surface-variant">No published articles yet.</p>
                        </div>
                    @endforelse
                </div>

                <!-- About Tab Content -->
                <div id="content-about" class="hidden bg-surface-container-low p-8 rounded-xl space-y-6">
                    <h3 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant/20 pb-4">About {{ $user->name }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        {{ $user->bio ?? 'This writer has not written a bio yet.' }}
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[24px]">location_on</span>
                            <div>
                                <p class="text-xs text-on-surface-variant font-medium uppercase">Location</p>
                                <p class="font-body-md text-on-surface">
                                    {{ $user->country_code ? ($countries[strtoupper($user->country_code)] ?? $user->country_code) : 'Worldwide' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[24px]">calendar_month</span>
                            <div>
                                <p class="text-xs text-on-surface-variant font-medium uppercase">Member Since</p>
                                <p class="font-body-md text-on-surface">{{ $user->created_at->format('F Y') }}</p>
                            </div>
                        </div>
                        @if ($user->field)
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary text-[24px]">workspace_premium</span>
                                <div>
                                    <p class="text-xs text-on-surface-variant font-medium uppercase">Expertise</p>
                                    <p class="font-body-md text-on-surface">{{ $user->field }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[24px]">mail</span>
                            <div>
                                <p class="text-xs text-on-surface-variant font-medium uppercase">Email</p>
                                <p class="font-body-md text-on-surface">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reading List Tab Content -->
                <div id="content-reading" class="hidden bg-surface-container-low p-8 rounded-xl text-center py-16">
                    <span class="material-symbols-outlined text-5xl text-outline mb-4">bookmarks</span>
                    <h4 class="font-headline-sm text-headline-sm text-on-surface mb-2">Reading List</h4>
                    <p class="text-on-surface-variant max-w-md mx-auto">
                        Reading lists and bookmarks are private. Bookmarked articles will be saved here in a future update.
                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-4 space-y-10">
                <!-- About Card -->
                <div class="bg-surface-container-low p-8 rounded-xl">
                    <h4 class="font-headline-md text-headline-md mb-4">About {{ $user->name }}</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                        {{ $user->bio ?? 'No bio written yet.' }}
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">location_on</span>
                            <span class="font-label-md text-label-md">
                                {{ $user->country_code ? ($countries[strtoupper($user->country_code)] ?? $user->country_code) : 'Worldwide' }}
                            </span>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">history_edu</span>
                            <span class="font-label-md text-label-md">Contributor since {{ $user->created_at->format('Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Similar Authors -->
                <div class="bg-white/50 border border-outline-variant/20 p-8 rounded-xl shadow-sm">
                    <h4 class="font-label-md text-label-md uppercase tracking-[0.2em] text-on-surface-variant mb-6">Similar Authors</h4>
                    <div class="space-y-6">
                        @forelse ($similarAuthors as $similarAuthor)
                            <div class="flex items-center justify-between">
                                <a href="{{ route('profile', $similarAuthor->username) }}" class="flex items-center gap-3 group">
                                    <div class="w-10 h-10 rounded-full bg-surface-container overflow-hidden">
                                        <img class="w-full h-full object-cover" 
                                             alt="{{ $similarAuthor->name }}" 
                                             src="{{ $similarAuthor->avatar ? Storage::url($similarAuthor->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($similarAuthor->name) . '&background=8b0e0f&color=fff' }}">
                                    </div>
                                    <div>
                                        <p class="font-label-md text-label-md font-bold group-hover:text-primary transition-colors">{{ $similarAuthor->name }}</p>
                                        <p class="text-[12px] text-on-surface-variant truncate max-w-[120px]">{{ $similarAuthor->field ?? ($similarAuthor->bio ?? 'Paperink Writer') }}</p>
                                    </div>
                                </a>
                                @auth
                                    @if (in_array($similarAuthor->id, $followedIds))
                                        <form action="{{ route('unfollow', $similarAuthor->username) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="border border-outline-variant px-4 py-1 rounded-full text-label-md font-label-md hover:bg-surface-container transition-colors">
                                                Following
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', $similarAuthor->username) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="border border-outline-variant px-4 py-1 rounded-full text-label-md font-label-md hover:bg-surface-container transition-colors">
                                                Follow
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('follow', $similarAuthor->username) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="border border-outline-variant px-4 py-1 rounded-full text-label-md font-label-md hover:bg-surface-container transition-colors">
                                            Follow
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        @empty
                            <p class="text-xs text-on-surface-variant text-center">No other writers found.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Social Proof -->
                <div class="bg-primary/5 p-8 rounded-xl border border-primary/10">
                    <h4 class="font-label-md text-label-md font-bold mb-2">Featured on</h4>
                    <div class="flex flex-wrap gap-4 opacity-60 grayscale hover:grayscale-0 transition-all">
                        <span class="font-headline-md italic">The Times</span>
                        <span class="font-headline-md italic">AIGA</span>
                        <span class="font-headline-md italic">Wired</span>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = [
                { btnId: 'tab-btn-published', contentId: 'content-published' },
                { btnId: 'tab-btn-about', contentId: 'content-about' },
                { btnId: 'tab-btn-reading', contentId: 'content-reading' }
            ];

            tabs.forEach(tab => {
                const btn = document.getElementById(tab.btnId);
                if (btn) {
                    btn.addEventListener('click', () => {
                        // Reset all tabs
                        tabs.forEach(t => {
                            const b = document.getElementById(t.btnId);
                            const c = document.getElementById(t.contentId);
                            if (b && c) {
                                b.className = 'px-6 py-4 font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors';
                                c.classList.add('hidden');
                            }
                        });

                        // Activate clicked tab
                        btn.className = 'px-6 py-4 font-label-md text-label-md text-primary border-b-2 border-primary font-bold';
                        const targetContent = document.getElementById(tab.contentId);
                        if (targetContent) {
                            targetContent.classList.remove('hidden');
                        }
                    });
                }
            });
        });
    </script>
</x-layout.main-layout>