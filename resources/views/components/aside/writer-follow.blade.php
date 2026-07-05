<!-- Writers to Follow -->
<div class="flex flex-col gap-stack-lg">
    <h4 class="font-label-md text-on-surface font-bold uppercase tracking-widest text-xs">Writers to follow</h4>
    <div class="flex flex-col gap-6">
        @forelse ($users as $user)
            <div class="flex items-center justify-between">
                <a href="{{ route('profile', $user->username) }}" class="flex items-center gap-3 group">
                    <img class="w-10 h-10 rounded-full object-cover shadow-sm group-hover:opacity-90 transition-opacity" 
                        alt="{{ $user->name }}"
                        src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=8b0e0f&color=fff' }}">
                    <div>
                        <span class="block font-label-md text-sm font-bold group-hover:text-primary transition-colors">{{ $user->name }}</span>
                        <span class="block text-[11px] text-on-surface-variant truncate max-w-[140px]">
                            {{ $user->field ?? ($user->bio ?? 'Paperink Writer') }}
                        </span>
                    </div>
                </a>
                
                @auth
                    @if (in_array($user->id, $followedIds))
                        <form action="{{ route('unfollow', $user->username) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant font-label-md text-[12px] hover:bg-surface-container-high transition-all">
                                Following
                            </button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->username) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-1.5 rounded-full border border-on-surface bg-on-surface text-white font-label-md text-[12px] hover:opacity-90 transition-all">
                                Follow
                            </button>
                        </form>
                    @endif
                @else
                    <form action="{{ route('follow', $user->username) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-4 py-1.5 rounded-full border border-on-surface bg-on-surface text-white font-label-md text-[12px] hover:opacity-90 transition-all">
                            Follow
                        </button>
                    </form>
                @endauth
            </div>
        @empty
            <p class="text-xs text-on-surface-variant text-center">No other writers found.</p>
        @endforelse
    </div>
    
    @if ($users->isNotEmpty())
        <div class="pt-2">
            <a href="{{ route('authors') }}" class="text-primary hover:underline font-label-md text-[12px] flex items-center gap-1">
                See more suggestions <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </a>
        </div>
    @endif
</div>