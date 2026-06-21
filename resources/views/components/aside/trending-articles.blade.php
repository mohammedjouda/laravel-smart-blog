@props([
    'title' => 'Trending on Ink',
])

<div>

    <div class="flex items-center gap-2 text-on-surface-variant font-bold uppercase tracking-widest text-xs">
        <span class="material-symbols-outlined text-sm">trending_up</span>
        Trending This Week
    </div>
    <div class="flex flex-col gap-10">
        <!-- Trending Item 1 -->
        <div class="grid grid-cols-[auto_1fr] gap-4 items-start">
            <span class="text-surface-container-highest font-display-lg text-4xl leading-none">01</span>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <img class="w-5 h-5 rounded-full object-cover"
                        data-alt="Headshot of Jiro Tanaka, a male software engineer with a friendly and professional demeanor. Neutral warm lighting, minimalist background. The portrait exudes expertise and approachability for a tech editorial context."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5lgYJX3pBQHb_u-iH3PY-gzkFdVMyhrxNOoZTFGhL2nkY0wwa6Ia6TBZWSbS4StgwvDhKwxYCtrumBH3TKYLPKCy0NeoW9wuIIYZGe4L9i3JB4lOorBfJhYhWsR3dlkdPbbIQzZAthVyDwy8CXjeqoTV9OM62b643y1gC7rdp2pl6zpaKNeDWzrQI6QlX5u3Xy90IZ1EWyDid_lPC2uU-GtKdL9FNIkSjmDnMCcF0cIxdHRDj3EeCIK_hw19sDcLLE1QBJ8cPITU">
                    <span class="font-label-md text-[12px]">Jiro Tanaka</span>
                </div>
                <h3
                    class="font-headline-md text-headline-md text-lg leading-tight hover:text-primary transition-colors cursor-pointer">
                    Rebuilding Our Event Pipeline From Scratch</h3>
                <span class="font-label-md text-[11px] text-on-surface-variant">Jun 9 · 14 min read · 311
                    reactions</span>
            </div>
        </div>
        <!-- Trending Item 2 -->
        <div class="grid grid-cols-[auto_1fr] gap-4 items-start">
            <span class="text-surface-container-highest font-display-lg text-4xl leading-none">02</span>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <img class="w-5 h-5 rounded-full object-cover"
                        data-alt="Close-up portrait of Amara Okafor, a thoughtful writer and designer. Soft focus background, elegant and clean lighting, reflecting a personality that values deep thinking and craft."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_TtcgKqSwERDSWvlIISoFqfQOUrSQWxz9s4ZyY2aOYznndyw4ZVM9PvH4tWCHHMoqDoCTTUA9uucA7bf3DxPmdd9_YServeLUfpJ7aQH32v9oqt60lF7G6Fa1nn8gTUrMRDXdPZsWUw4NrswZ_PRcx-ugMsIGCZPxjhRyAUYHIPfbwFrSYOwMrUL-hqG5oPKmN80BjsH8DyUoEcI6NFhapl2bunaz0m3tDyNxzlQKPjylPmEbfg6i-BtTFrmrWy7OlBQtaVJVJDc">
                    <span class="font-label-md text-[12px]">Amara Okafor</span>
                </div>
                <h3
                    class="font-headline-md text-headline-md text-lg leading-tight hover:text-primary transition-colors cursor-pointer">
                    Writing Is Thinking, Out Loud</h3>
                <span class="font-label-md text-[11px] text-on-surface-variant">Jun 7 · 6 min read · 894
                    reactions</span>
            </div>
        </div>
        <!-- Trending Item 3 -->
        <div class="grid grid-cols-[auto_1fr] gap-4 items-start">
            <span class="text-surface-container-highest font-display-lg text-4xl leading-none">03</span>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <img class="w-5 h-5 rounded-full object-cover"
                        data-alt="A portrait of Noah Lindberg, an entrepreneurial founder with a visionary look. Minimalist aesthetic, clean composition, professional lighting against a warm-toned wall."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnyeKaqFQA09NzHv74fzAprzWfxf8np9s5P4syOCY-ISM9GOxnJ646RU3n2jD-RKh3arnx1VldsfSunOOrDE-_g_XZwfGl16Ut3mrWGyiieC03jTNGNc_2leCeFKLv3rEWfHzbHSKhHNS7EOSh5SW-Lp8BBxisy-u2fz5kn6TaJJ9H-B3hWLhof5yYHu76BM5taW7Nsy7lbpHDQx_ntMKcIjUxmjE_0ET3ldk0fZb80VS3pUJb7BbhBJHcj9SaSpwhK2l0tMkX2X4">
                    <span class="font-label-md text-[12px]">Noah Lindberg</span>
                </div>
                <h3
                    class="font-headline-md text-headline-md text-lg leading-tight hover:text-primary transition-colors cursor-pointer">
                    The Economics of Small Software</h3>
                <span class="font-label-md text-[11px] text-on-surface-variant">Jun 4 · 11 min read · 612
                    reactions</span>
            </div>
        </div>
    </div>

</div>
