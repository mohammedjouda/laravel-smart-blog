<x-layout.main-layout title="{{ $user->name }}'s Profile">
    <main class="flex-grow w-full max-w-container-max mx-auto px-margin-desktop py-section-gap">
        <!-- Hero Header -->
        <div class="bg-surface-container-low border border-outline-variant/30 rounded-2xl p-8 md:p-12 mb-12 shadow-sm relative overflow-hidden">
            <!-- Background Accent/Glow -->
            <div class="absolute -right-16 -top-16 w-64 h-64 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start relative z-10">
                <!-- Avatar & Verified Badge -->
                <div class="relative flex-shrink-0">
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-white shadow-md ring-1 ring-outline-variant/30">
                        <img class="w-full h-full object-cover"
                             alt="{{ $user->name }}"
                             src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=8b0e0f&color=fff' }}" />
                    </div>
                    @if($user->email_verified_at)
                        <div class="absolute bottom-1 right-2 bg-tertiary text-on-tertiary p-1.5 rounded-full border-2 border-white shadow-sm flex items-center justify-center">
                            <span class="material-symbols-outlined text-[16px] md:text-[18px] block" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
                        </div>
                    @endif
                </div>

                <!-- Info Block -->
                <div class="flex-grow text-center md:text-left">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                        <div>
                            <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mb-1">
                                <h1 class="font-headline-lg text-headline-lg md:text-display-md text-on-surface">
                                    {{ $user->name }}
                                </h1>
                                @if ($isFollower)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-surface-container-high text-on-surface-variant">
                                        Follows you
                                    </span>
                                @endif
                            </div>
                            <p class="text-primary font-semibold font-label-md text-label-md">
                                @ {{ $user->username }}
                            </p>
                        </div>
                        
                        <!-- Profile Action Buttons -->
                        <div class="flex flex-wrap justify-center md:justify-end gap-3">
                            @if(auth()->check() && auth()->id() === $user->id)
                                <a href="{{ route('user-profile-information.update') }}"
                                   class="flex items-center gap-3 bg-surface border border-outline-variant/40 hover:bg-surface-container text-on-surface-variant hover:text-on-surface py-2.5 px-5 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                    <span class="material-symbols-outlined text-[18px]">settings</span>
                                    Edit Settings
                                </a>
                            @else
                                @auth
                                    @if ($isFollowing)
                                        <form action="{{ route('unfollow', $user->username) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="flex items-center gap-3 bg-secondary/10 hover:bg-secondary/20 text-on-surface border border-outline-variant/30 py-2.5 px-6 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                                <span class="material-symbols-outlined text-[18px]">person_remove</span>
                                                Unfollow
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', $user->username) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="flex items-center gap-3 bg-primary text-on-primary hover:bg-primary-container py-2.5 px-6 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                                                Follow
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('follow', $user->username) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="flex items-center gap-3 bg-primary text-on-primary hover:bg-primary-container py-2.5 px-6 rounded-lg font-label-md text-label-md transition-all active:scale-[0.98]">
                                            <span class="material-symbols-outlined text-[18px]">person_add</span>
                                            Follow
                                        </button>
                                    </form>
                                @endauth
                            @endif
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!');"
                                    class="flex items-center justify-center border border-outline-variant/40 hover:bg-surface-container text-on-surface-variant w-11 h-11 rounded-lg transition-all active:scale-[0.98]"
                                    title="Copy profile link">
                                <span class="material-symbols-outlined text-[18px]">share</span>
                            </button>
                        </div>
                    </div>

                    <!-- Bio -->
                    <p class="text-on-surface-variant font-body-lg text-body-lg mb-6 leading-relaxed max-w-3xl mx-auto md:mx-0">
                        {{ $user->bio ?? 'This writer hasn\'t published a bio yet.' }}
                    </p>

                    <!-- Meta details -->
                    <div class="flex flex-wrap justify-center md:justify-start gap-x-6 gap-y-2 text-on-surface-variant font-label-md text-label-md opacity-95">
                        @if($user->field)
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[18px] text-primary">work</span>
                                <span>{{ $user->field }}</span>
                            </div>
                        @endif
                        @if($user->country_code)
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
                                <span>{{ strtoupper($user->country_code) }}</span>
                            </div>
                        @endif
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary">calendar_month</span>
                            <span>Member since {{ $user->created_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Split Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left Side: Publications Feed -->
            <div class="lg:col-span-8 space-y-8">
                <div class="border-b border-outline-variant/30 pb-4 mb-8">
                    <h2 class="font-headline-md text-headline-md text-on-surface">Publications ({{ $posts->count() }})</h2>
                </div>

                @forelse ($posts as $post)
                    <article class="grid grid-cols-1 md:grid-cols-[1fr_200px] gap-8 group cursor-pointer border-b border-outline-variant/20 pb-8 last:border-0"
                             onclick="window.location.href='{{ route('posts.show', $post->slug) }}';">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-2 font-label-md text-[12px] text-on-surface-variant">
                                <span>{{ $post->created_at->format('M j, Y') }}</span>
                                <span class="opacity-50">·</span>
                                <span class="text-primary font-bold">{{ $post->category->name ?? 'General' }}</span>
                            </div>
                            
                            <h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                                {{ $post->title }}
                            </h3>
                            
                            <p class="font-body-md text-on-surface-variant line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                            
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center gap-4">
                                    @if ($post->tags->isNotEmpty())
                                        @foreach ($post->tags as $tag)
                                            <span class="bg-surface-container-high px-3 py-1 rounded-full font-label-md text-[11px] text-on-surface-variant">#{{ $tag->name }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="flex items-center gap-4 text-on-surface-variant">
                                    <span class="material-symbols-outlined text-xl hover:text-on-surface transition-colors" onclick="event.stopPropagation();">bookmark</span>
                                </div>
                            </div>
                        </div>
                        
                        @if ($post->cover_image)
                            <div class="hidden md:block w-full h-32 rounded-lg overflow-hidden bg-surface-container-low">
                                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     alt="{{ $post->title }}"
                                     src="{{ Storage::url($post->cover_image) }}" />
                            </div>
                        @else
                            <div class="hidden md:block w-full h-32 rounded-lg overflow-hidden bg-surface-container-low flex items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-outline-variant/60">article</span>
                            </div>
                        @endif
                    </article>
                @empty
                    <div class="py-16 text-center bg-surface-container-lowest border border-outline-variant/20 rounded-xl">
                        <span class="material-symbols-outlined text-6xl text-outline mb-4">edit_off</span>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-2">No publications yet</h3>
                        <p class="text-on-surface-variant font-body-md text-body-md max-w-sm mx-auto">
                            {{ $user->name }} has not published any articles on the platform yet. Check back later!
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Right Side: Sidebar Stats & Details -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Statistics Card -->
                <div class="bg-surface border border-outline-variant/30 rounded-xl p-6">
                    <h3 class="text-label-md font-label-md font-bold uppercase tracking-wider text-outline mb-6">Author Metrics</h3>
                    
                    <div class="space-y-6">
                        <div class="flex justify-between items-center">
                            <span class="text-on-surface-variant font-body-md text-body-md">Total Posts</span>
                            <span class="font-headline-md text-headline-md text-primary font-bold">{{ $posts->count() }}</span>
                        </div>
                        <div class="h-[1px] bg-outline-variant/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-on-surface-variant font-body-md text-body-md">Est. Read Time</span>
                            <span class="font-headline-md text-headline-md text-primary font-bold">
                                {{ $posts->count() * 7 }} mins
                            </span>
                        </div>
                        <div class="h-[1px] bg-outline-variant/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-on-surface-variant font-body-md text-body-md">Followers</span>
                            <span class="font-headline-md text-headline-md text-primary font-bold">
                                {{ $user->followers_count }}
                            </span>
                        </div>
                        <div class="h-[1px] bg-outline-variant/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-on-surface-variant font-body-md text-body-md">Following</span>
                            <span class="font-headline-md text-headline-md text-primary font-bold">
                                {{ $user->followed_count }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="bg-surface border border-outline-variant/30 rounded-xl p-6">
                    <h3 class="text-label-md font-label-md font-bold uppercase tracking-wider text-outline mb-6">About Writer</h3>
                    
                    <div class="space-y-4 font-body-md text-body-md text-on-surface-variant">
                        @if($user->email)
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-[20px] text-primary">mail</span>
                                <div class="truncate">
                                    <p class="text-xs text-outline font-bold font-label-md uppercase">Email Address</p>
                                    <a href="mailto:{{ $user->email }}" class="hover:underline text-on-surface">{{ $user->email }}</a>
                                </div>
                            </div>
                        @endif
                        
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-[20px] text-primary">schedule</span>
                            <div>
                                <p class="text-xs text-outline font-bold font-label-md uppercase">Timezone</p>
                                <p class="text-on-surface">{{ $user->timezone ?? 'UTC' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-[20px] text-primary">shield</span>
                            <div>
                                <p class="text-xs text-outline font-bold font-label-md uppercase">Account Status</p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-tertiary-fixed text-on-tertiary-fixed capitalize">
                                    {{ $user->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout.main-layout>
