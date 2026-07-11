<x-layout.main-layout title="Home">
    <main class="max-w-container-max mx-auto px-margin-desktop py-12">
        <!-- Article Layout -->
        <main class="max-w-container-max mx-auto px-margin-desktop py-12 md:py-20">
            <div class="max-w-[760px] mx-auto">
                <!-- Metadata -->
                <div class="mb-8 flex items-center gap-2">
                    <span class="text-primary font-bold tracking-widest text-[11px] uppercase font-label-md">Editor's
                        Pick</span>
                    <span class="text-outline-variant">•</span>
                    <span class="text-on-surface-variant font-label-md text-label-md">{{ $post->created_at->format('M j, Y') }}</span>
                </div>
                <!-- Title -->
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg mb-6 text-on-surface">
                    {{ $post->title }}
                </h1>
                <p class="font-headline-md text-headline-md text-on-surface-variant italic mb-10 leading-relaxed">
                    {{ $post->excerpt }}
                </p>
                <!-- Author Bar -->
                <div class="flex items-center justify-between py-6 border-y border-outline-variant/30 mb-12">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('profile', $post->user->username) }}">
                            <img class="w-12 h-12 rounded-full object-cover shadow-sm hover:opacity-90 transition-opacity"
                                alt="{{ $post->user->name }}"
                                src="{{ $post->user->avatar ? Storage::url($post->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&background=8b0e0f&color=fff' }}">
                        </a>
                        <div>
                            <a href="{{ route('profile', $post->user->username) }}" class="hover:text-primary transition-colors font-bold font-label-md text-on-surface text-[15px] block">
                                {{ $post->user->name }}
                            </a>
                            <div class="text-on-surface-variant text-label-md">8 min read • {{ $post->user->field ?? 'Paperink Writer' }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="w-10 h-10 rounded-full border border-outline-variant/40 flex items-center justify-center hover:bg-surface-container-low transition-colors text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">share</span>
                        </button>
                        <button onclick="toggleBookmark(this, '{{ $post->slug }}')" data-bookmark-slug="{{ $post->slug }}"
                            class="w-10 h-10 rounded-full border border-outline-variant/40 flex items-center justify-center hover:bg-surface-container-low transition-colors {{ $isBookmarked ? 'text-primary' : 'text-on-surface-variant' }}">
                            <span class="material-symbols-outlined text-[20px]" {!! $isBookmarked ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>bookmark</span>
                        </button>
                        <button
                            class="w-10 h-10 rounded-full border border-outline-variant/40 flex items-center justify-center hover:bg-surface-container-low transition-colors text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">more_horiz</span>
                        </button>
                    </div>
                </div>
                <!-- Main Image -->
                <figure class="mb-12">
                    <img class="w-full aspect-video object-cover rounded-lg shadow-sm"
                        data-alt="An atmospheric, cinematic close-up of a sleek laptop on a dark wooden desk in a dimly lit office. A warm desk lamp illuminates the scene, casting soft shadows. The laptop screen displays a minimalist, dark abstract wallpaper with deep blue and black tones. Next to it sits a pencil holder and a computer mouse. The mood is focused, serene, and intellectually refined, matching a premium editorial aesthetic."
                        src="{{ $post->cover_image ? (\Illuminate\Support\Str::startsWith($post->cover_image, ['http://', 'https://']) ? $post->cover_image : Storage::url($post->cover_image)) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDWMCCh29B7goocahYRoAns30UEka8Wz9c_e3sNdFVZcfT5R_41GKiV_x6-Qf_XT_R2WqsBypXa2VrBihQwWXY1k4YV2jBEA3fo3mUPaGwpPCwkmbXgpS90fTmAmqGNhTGrvriCRJZR7tCoUS1r-lou4U0uOKqDyj5lnLvsHgeZO8RqXsv8Aa5TCkAJBFfyvbXWr2SrGQQe42jeUQnsSKxaJ-75atMEMtt-N0AFR0M6TIGyHvNk6b_nmIsUfEUG_qu7xK69LuCIJo8' }}">
                    <figcaption class="mt-4 text-center text-label-md font-label-md text-on-surface-variant/60 italic">
                        Photography by Julian Herwig for Paperink Studio.</figcaption>
                </figure>
                <!-- Article Content -->
                <article class="article-content font-body-lg text-body-lg leading-relaxed">
                    {!! $post->content !!}
                </article>
                <!-- Bottom Author Bio -->
                <section class="mt-16 pt-10 border-t border-outline-variant/30">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <a href="{{ route('profile', $post->user->username) }}">
                            <img class="w-24 h-24 rounded-full object-cover shadow-sm hover:opacity-90 transition-opacity"
                                alt="{{ $post->user->name }}"
                                src="{{ $post->user->avatar ? Storage::url($post->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&background=8b0e0f&color=fff' }}">
                        </a>
                        <div class="flex-1">
                            <h4 class="font-headline-md text-headline-md text-on-surface mb-2">
                                Written by <a href="{{ route('profile', $post->user->username) }}" class="hover:text-primary transition-colors">{{ $post->user->name }}</a>
                            </h4>
                            <p class="text-on-surface-variant text-body-md mb-4 leading-relaxed">
                                {{ $post->user->bio ?? ($post->user->field ?? 'No biography written yet.') }}
                            </p>
                            <div class="flex items-center gap-4">
                                @if(auth()->check() && auth()->id() === $post->user_id)
                                    <!-- Logged in as post author -->
                                @else
                                    @if ($isFollowing)
                                        <form action="{{ route('unfollow', $post->user->username) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-secondary/10 hover:bg-secondary/20 text-on-surface px-6 py-2 rounded-full font-label-md text-label-md font-bold transition-all active:scale-[0.98]">
                                                Unfollow
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', $post->user->username) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-primary text-on-primary px-6 py-2 rounded-full font-label-md text-label-md font-bold hover:bg-primary-container transition-all active:scale-[0.98]">
                                                Follow
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                <div class="flex gap-3 text-on-surface-variant">
                                    <a class="hover:text-primary transition-colors" href="mailto:{{ $post->user->email }}"><span
                                            class="material-symbols-outlined text-[20px]">alternate_email</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Tags and Actions -->
                <div
                    class="mt-12 flex flex-wrap gap-2 items-center justify-between border-t border-outline-variant/20 pt-8">
                    <div class="flex gap-2 flex-wrap">
                        @foreach ($post->tags as $tag)
                            <span
                                class="bg-surface-container-high px-3 py-1 rounded-full text-on-surface-variant font-label-md text-label-md">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <div class="flex items-center gap-6">
                        <button onclick="toggleLike(this, '{{ $post->slug }}')" data-like-slug="{{ $post->slug }}"
                            class="flex items-center gap-2 transition-colors font-label-md text-label-md {{ $isLiked ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }}">
                            <span class="material-symbols-outlined text-[20px]" {!! $isLiked ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>favorite</span>
                            <span class="like-count">{{ $post->likes_count }}</span>
                        </button>
                        <a href="#comments"
                            class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md cursor-pointer">
                            <span class="material-symbols-outlined text-[20px]">chat_bubble</span> 
                            <span>{{ $post->comments_count }}</span>
                        </a>
                    </div>
                </div>

                <!-- Comments Section -->
                <section id="comments" class="mt-16 pt-10 border-t border-outline-variant/30">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-8">
                        Responses ({{ $post->comments_count }})
                    </h3>

                    @auth
                        <!-- Comment Form -->
                        <form action="{{ route('posts.comments.store', $post->slug) }}" method="POST" class="mb-10 flex gap-4 items-start">
                            @csrf
                            <img class="w-10 h-10 rounded-full object-cover shadow-sm"
                                alt="{{ auth()->user()->name }}"
                                src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=8b0e0f&color=fff' }}">
                            <div class="flex-1">
                                <textarea name="content" rows="3" required
                                    placeholder="What are your thoughts?"
                                    class="w-full bg-surface-container-low text-on-surface border border-outline-variant/20 rounded-xl px-4 py-3 placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all text-body-md"></textarea>
                                <div class="mt-2 flex justify-end">
                                    <button type="submit"
                                        class="bg-primary text-on-primary px-6 py-2 rounded-full font-label-md text-label-md font-bold hover:bg-primary-container transition-all active:scale-[0.98] flex items-center gap-1 shadow-sm">
                                        Respond
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <!-- Sign In Prompt -->
                        <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/10 text-center mb-10">
                            <p class="text-on-surface-variant font-body-md mb-3">Join the conversation. Sign in to leave a response.</p>
                            <a href="{{ route('login') }}"
                                class="inline-block bg-primary text-on-primary px-6 py-2 rounded-full font-label-md text-label-md font-bold hover:bg-primary-container transition-all">
                                Sign In
                            </a>
                        </div>
                    @endauth

                    <!-- Comments List -->
                    <div class="space-y-6">
                        @forelse($comments as $comment)
                            <div class="flex gap-4 items-start pb-6 border-b border-outline-variant/10 last:border-b-0">
                                <a href="{{ route('profile', $comment->user->username) }}">
                                    <img class="w-10 h-10 rounded-full object-cover shadow-sm hover:opacity-90 transition-opacity"
                                        alt="{{ $comment->user->name }}"
                                        src="{{ $comment->user->avatar ? Storage::url($comment->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->name) . '&background=8b0e0f&color=fff' }}">
                                </a>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <div>
                                            <a href="{{ route('profile', $comment->user->username) }}" class="font-bold text-on-surface hover:text-primary transition-colors text-[14px]">
                                                {{ $comment->user->name }}
                                            </a>
                                            <span class="text-on-surface-variant/60 text-[12px] ml-2">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->id() === $post->user_id))
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this response?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-on-surface-variant/50 hover:text-error transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <p class="text-on-surface text-body-md leading-relaxed whitespace-pre-line">
                                        {{ $comment->content }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-on-surface-variant/60 font-body-md py-4">No responses yet. Be the first to share your thoughts!</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </main>
        <!-- More From Paperink (Simple Bento) -->
        <section class="bg-surface-container-low py-section-gap">
            <div class="max-w-container-max mx-auto px-margin-desktop">
                <div class="flex justify-between items-end mb-10">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">Keep Reading</h2>
                        <p class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider mt-2">
                            Selected for you</p>
                    </div>
                    <a class="text-primary font-bold font-label-md text-label-md hover:underline flex items-center gap-1"
                        href="#">
                        Explore all articles <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                    @forelse ($suggestions as $suggestedPost)
                        <a class="group block bg-surface-container-lowest p-5 rounded-xl border border-outline-variant/10 hover:border-primary/30 transition-all hover:shadow-lg flex flex-col justify-between"
                            href="{{ route('posts.show', $suggestedPost->slug) }}">
                            <div>
                                <div class="w-full aspect-[4/3] overflow-hidden rounded-lg mb-4">
                                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-350"
                                        alt="{{ $suggestedPost->title }}"
                                        src="{{ $suggestedPost->cover_image ? (\Illuminate\Support\Str::startsWith($suggestedPost->cover_image, ['http://', 'https://']) ? $suggestedPost->cover_image : Storage::url($suggestedPost->cover_image)) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuD_tNX4dTWSKCs-vlHH1VXNA-0LUZUQsSIFkz--bCHZyZlUIevNiLqTfmg7s7fbv7Qe-Mf0Co60Vba1ijyw2XcYDRif1hCtX-ZxagEW4N1SfcRwFLICb4ZgKeKlf-_yvDoUcwiwRCzyTzSeXiX1LBzg-CCUU38NALBC3weNK30ywoUAWo2cuA4HVmYLut_sd8MVTYDVp4TNlXT1BBIhRCOtBqlO3i0ypH9ZVZ8kCnIrLz-Y54FF6hEXWKpShw9Xw3h-2N22riAi7mQ' }}">
                                </div>
                                <span class="text-primary font-bold text-[11px] uppercase font-label-md block mb-2">
                                    {{ $suggestedPost->category?->name ?? 'Article' }}
                                </span>
                                <h3 class="font-headline-md text-headline-md text-on-surface mb-3 group-hover:text-primary transition-colors">
                                    {{ $suggestedPost->title }}
                                </h3>
                                <p class="text-on-surface-variant text-body-md line-clamp-2">
                                    {{ $suggestedPost->excerpt }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="col-span-full text-center text-on-surface-variant py-8">No other suggested articles found.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</x-layout.main-layout>
