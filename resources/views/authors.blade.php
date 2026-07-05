<x-layout.main-layout title="Authors">
    <!-- Main Content Canvas -->
    <main class="flex-grow w-full max-w-container-max mx-auto px-margin-desktop py-section-gap">
        <!-- Header & Search -->
        <header class="flex flex-col md:flex-row md:items-end justify-between gap-stack-lg mb-12">
            <div class="max-w-2xl">
                <h1
                    class="font-headline-lg text-headline-lg md:text-display-lg md:font-display-lg text-on-surface mb-stack-sm">
                    Meet our writers</h1>
                <p class="text-on-surface-variant font-body-lg text-body-lg opacity-80">Discover the brilliant minds
                    shaping the future of digital journalism and literary exploration.</p>
            </div>
            <form action="{{ route('authors') }}" method="GET" class="relative w-full md:w-80 group">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-outline">
                    <span class="material-symbols-outlined" data-icon="search">search</span>
                </div>
                <input
                    name="search"
                    value="{{ request('search') }}"
                    class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-lg py-3 pl-12 pr-4 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all font-body-md text-body-md"
                    placeholder="Search authors..." type="text" />
            </form>
        </header>
        <!-- Bento/Grid Authors Layout -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            @forelse ($authors as $author)
                <div
                    class="bg-surface-container-low p-stack-lg rounded-xl flex flex-col items-center text-center transition-all hover:translate-y-[-4px] hover:shadow-lg hover:shadow-primary/5 group">
                    <div class="mb-stack-md relative">
                        <div
                            class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-sm ring-1 ring-outline-variant/30">
                            <img class="w-full h-full object-cover"
                                alt="{{ $author->name }}"
                                src="{{ $author->avatar ? Storage::url($author->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($author->name) . '&background=8b0e0f&color=fff' }}" />
                        </div>
                        @if($author->email_verified_at)
                            <div
                                class="absolute bottom-1 right-1 bg-tertiary text-on-tertiary p-1 rounded-full border-2 border-white">
                                <span class="material-symbols-outlined text-[14px]" data-icon="verified"
                                    style="font-variation-settings: 'FILL' 1;">verified</span>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface {{ auth()->check() && in_array($author->id, $followerIds) ? 'mb-1' : 'mb-stack-sm' }}">{{ $author->name }}</h3>
                    @auth
                        @if (in_array($author->id, $followerIds))
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-surface-container-high text-on-surface-variant mb-3">
                                Follows you
                            </span>
                        @endif
                    @endauth
                    <p class="text-on-surface-variant font-body-md text-body-md mb-6 leading-relaxed px-4">
                        {{ $author->bio ?? ($author->field ?? 'No bio written yet.') }}
                    </p>
                    <div class="flex items-center justify-around w-full border-y border-outline-variant/20 py-4 mb-6">
                        <div class="flex flex-col">
                            <span
                                class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Posts</span>
                            <span class="font-headline-md text-headline-md text-primary">{{ $author->posts_count }}</span>
                        </div>
                        <div class="w-[1px] h-8 bg-outline-variant/30"></div>
                        <div class="flex flex-col">
                            <span
                                class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Followers</span>
                            <span class="font-headline-md text-headline-md text-primary">{{ $author->followers_count }}</span>
                        </div>
                        <div class="w-[1px] h-8 bg-outline-variant/30"></div>
                        <div class="flex flex-col">
                            <span
                                class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Following</span>
                            <span class="font-headline-md text-headline-md text-primary">{{ $author->followed_count }}</span>
                        </div>
                    </div>
                    
                    <div class="w-full mb-3">
                        @auth
                            @if (in_array($author->id, $followedIds))
                                <form action="{{ route('unfollow', $author->username) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center justify-center gap-2 bg-secondary/10 hover:bg-secondary/20 text-on-surface border border-outline-variant/30 py-3 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                        Unfollow
                                        <span class="material-symbols-outlined text-[18px]">
                                            person_remove
                                        </span>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('follow', $author->username) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center justify-center gap-2 bg-primary-container text-on-primary border border-transparent hover:bg-primary-container/90 py-3 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                        Follow
                                        <span class="material-symbols-outlined text-[18px]">
                                            person_add
                                        </span>
                                    </button>
                                </form>
                            @endif
                        @else
                            <form action="{{ route('follow', $author->username) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 bg-primary-container text-on-primary border border-transparent hover:bg-primary-container/90 py-3 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                    Follow
                                    <span class="material-symbols-outlined text-[18px]">
                                        person_add
                                    </span>
                                </button>
                            </form>
                        @endauth
                    </div>

                    <a href="{{ route('profile', $author->username) }}"
                        class="w-full flex items-center justify-center gap-2 py-3 rounded-lg border border-outline-variant/40 text-on-surface-variant hover:text-primary hover:border-primary transition-all font-label-md text-label-md">
                        View Profile
                        <span class="material-symbols-outlined text-[18px]">
                            arrow_forward
                        </span>
                    </a>
                </div>
            @empty
                <div class="col-span-full py-12 flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-6xl text-outline mb-4">search_off</span>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">No writers found</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md max-w-md">We couldn't find any writers matching "{{ request('search') }}". Try searching for a different name or keyword.</p>
                </div>
            @endforelse
        </section>
        <!-- Pagination / Load More -->
        <div class="mt-section-gap flex flex-col items-center gap-stack-md">
            @if($authors->count() > 10)
                <button
                    class="px-8 py-4 bg-surface-container border border-outline-variant/50 text-on-surface rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-all">Load
                    More Authors</button>
            @endif
            <p class="text-on-surface-variant font-label-md text-label-md">Showing {{ $authors->count() }} of {{ $authors->count() }} independent writers</p>
        </div>
    </main>
</x-layout.main-layout>
