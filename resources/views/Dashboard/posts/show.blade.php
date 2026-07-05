<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $post->title }} | Paperink</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;family=Hanken+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: '#fff8f7',
                        'paper-bright': '#ffffff',
                        primary: '#8b0e0f',
                        'primary-container': '#ad2a24',
                        'on-primary': '#ffffff',
                        'on-surface': '#261817',
                        'on-surface-variant': '#59413e',
                        'surface-container-low': '#fff0ee',
                        'surface-container-high': '#fce2df',
                        'outline-variant': '#e1bfba',
                        tertiary: '#004e46',
                        error: '#ba1a1a',
                    },
                    fontFamily: {
                        'headline-lg': ['Libre Caslon Text'],
                        'headline-md': ['Libre Caslon Text'],
                        'body-md': ['Hanken Grotesk'],
                        'body-lg': ['Hanken Grotesk'],
                        'label-md': ['Hanken Grotesk'],
                    },
                    fontSize: {
                        'display-lg': ['56px', {
                            lineHeight: '1.1',
                            fontWeight: '700'
                        }],
                        'display-lg-mobile': ['38px', {
                            lineHeight: '1.1',
                            fontWeight: '700'
                        }],
                        'headline-md': ['24px', {
                            lineHeight: '1.3',
                            fontWeight: '600'
                        }],
                        'body-lg': ['18px', {
                            lineHeight: '1.7'
                        }],
                        'body-md': ['15px', {
                            lineHeight: '1.5'
                        }],
                        'label-md': ['13px', {
                            lineHeight: '1.2',
                            letterSpacing: '0.05em',
                            fontWeight: '500'
                        }],
                    },
                    spacing: {
                        'margin-desktop': '40px',
                        'container-max': '1200px',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background text-on-surface font-body-md min-h-screen">
    <header class="bg-background border-b border-outline-variant/30">
        <div class="flex justify-between items-center w-full px-margin-desktop py-4 max-w-container-max mx-auto">
            <a class="font-headline-lg text-[28px] font-bold text-on-surface" href="{{ route('home') }}">Paperink</a>
            <div class="flex items-center gap-4">
                @if (! $publicView)
                <a class="text-on-surface-variant font-label-md hover:text-primary" href="{{ route('dashboard.posts.index') }}">Dashboard</a>
                <a class="px-5 py-2 rounded-lg bg-primary-container text-on-primary font-label-md hover:bg-primary transition-all"
                    href="{{ route('dashboard.posts.edit', $post) }}">Edit</a>
                @else
                <a class="text-on-surface-variant font-label-md hover:text-primary" href="{{ route('home') }}">Feed</a>
                @endif
            </div>
        </div>
    </header>

    <main class="max-w-[920px] mx-auto px-margin-desktop py-14">
        @if (session('status'))
        <div class="mb-8 rounded-lg border border-tertiary/20 bg-surface-container-low px-4 py-3 text-tertiary">
            {{ session('status') }}
        </div>
        @endif

        <article>
            <div class="mb-8 flex flex-wrap items-center gap-3 text-label-md text-on-surface-variant uppercase tracking-widest">
                <span>{{ $post->category?->name ?? 'Uncategorized' }}</span>
                <span>/</span>
                <span>{{ $post->created_at?->format('M d, Y') }}</span>
                <span>/</span>
                <span>{{ $post->views }} views</span>
                @if (! $publicView)
                <span class="rounded-full bg-surface-container-high px-3 py-1 capitalize">{{ $post->status }}</span>
                @endif
            </div>

            <h1 class="font-headline-lg text-display-lg-mobile md:text-display-lg mb-6">{{ $post->title }}</h1>

            @if ($post->excerpt)
            <p class="text-body-lg text-on-surface-variant mb-10">{{ $post->excerpt }}</p>
            @endif

            <div class="flex items-center gap-3 mb-10">
                <span class="material-symbols-outlined text-[36px] text-on-surface-variant">account_circle</span>
                <div>
                    <div class="font-label-md text-on-surface">{{ $post->user?->name ?? 'Unknown author' }}</div>
                    <div class="text-label-md text-on-surface-variant">{{ $post->user?->email }}</div>
                </div>
            </div>

            @if ($post->cover_image)
            <img class="w-full max-h-[460px] object-cover rounded-xl border border-outline-variant/30 mb-12"
                src="{{ \Illuminate\Support\Str::startsWith($post->cover_image, ['http://', 'https://']) ? $post->cover_image : Storage::url($post->cover_image) }}"
                alt="{{ $post->title }}">
            @endif

            <div class="prose max-w-none font-body-lg text-body-lg text-on-surface-variant whitespace-pre-line">
                {!! $post->content !!} </div>
        </article>

        @if (! $publicView)
        <div class="mt-14 pt-8 border-t border-outline-variant/30 flex flex-wrap gap-3">
            <a class="px-5 py-3 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-low"
                href="{{ route('dashboard.posts.index') }}">Back to dashboard</a>
            <a class="px-5 py-3 rounded-lg bg-primary-container text-on-primary hover:bg-primary"
                href="{{ route('dashboard.posts.edit', $post) }}">Edit post</a>
            <form action="{{ route('dashboard.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="px-5 py-3 rounded-lg border border-error/30 text-error hover:bg-error/5" type="submit">Delete post</button>
            </form>
        </div>
        @endif
    </main>
</body>

</html>