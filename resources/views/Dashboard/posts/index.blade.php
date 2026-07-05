<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard | Paperink</title>
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
                        'surface-container-lowest': '#ffffff',
                        'surface-container-high': '#fce2df',
                        'outline-variant': '#e1bfba',
                        tertiary: '#004e46',
                        error: '#ba1a1a',
                    },
                    fontFamily: {
                        'headline-lg': ['Libre Caslon Text'],
                        'headline-md': ['Libre Caslon Text'],
                        'body-md': ['Hanken Grotesk'],
                        'label-md': ['Hanken Grotesk'],
                    },
                    fontSize: {
                        'headline-lg': ['32px', { lineHeight: '1.2', fontWeight: '700' }],
                        'headline-md': ['24px', { lineHeight: '1.3', fontWeight: '600' }],
                        'body-md': ['15px', { lineHeight: '1.5' }],
                        'label-md': ['13px', { lineHeight: '1.2', letterSpacing: '0.05em', fontWeight: '500' }],
                    },
                    spacing: {
                        gutter: '24px',
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
            <a class="font-headline-lg text-headline-lg font-bold text-on-surface" href="{{ route('home') }}">Paperink</a>
            <div class="flex items-center gap-5">
                <a class="text-primary font-label-md font-bold" href="{{ route('dashboard.posts.index') }}">Dashboard</a>
                <a class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-md font-bold hover:bg-primary-container transition-colors"
                    href="{{ route('dashboard.posts.create') }}">Write</a>
            </div>
        </div>
    </header>

    <main class="max-w-container-max mx-auto px-margin-desktop py-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Content Index</h1>
                <p class="text-on-surface-variant">Manage your posts, drafts, and archived entries.</p>
            </div>
            <div class="flex bg-surface-container-low p-1 rounded-lg border border-outline-variant/20">
                <a class="px-4 py-2 rounded-md text-label-md {{ $status ? 'text-on-surface-variant hover:text-on-surface' : 'bg-paper-bright shadow-sm text-primary font-bold' }}"
                    href="{{ route('dashboard.posts.index') }}">All</a>
                @foreach ($statusOptions as $option)
                    <a class="px-4 py-2 rounded-md text-label-md {{ $status === $option['value'] ? 'bg-paper-bright shadow-sm text-primary font-bold' : 'text-on-surface-variant hover:text-on-surface' }}"
                        href="{{ route('dashboard.posts.index', ['status' => $option['value']]) }}">
                        {{ $option['name'] }} {{ $option['count'] }}
                    </a>
                @endforeach
            </div>
        </div>

        @if (session('status'))
            <div class="mb-6 rounded-lg border border-tertiary/20 bg-surface-container-low px-4 py-3 text-tertiary">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-10">
            <div class="bg-surface-container-low p-6 border border-outline-variant/20 rounded-xl">
                <span class="text-label-md text-on-surface-variant uppercase tracking-wider">Total Posts</span>
                <div class="text-headline-md font-headline-md mt-2">{{ $totalPosts }}</div>
            </div>
            @foreach ($statusOptions as $option)
                <div class="bg-surface-container-low p-6 border border-outline-variant/20 rounded-xl">
                    <span class="text-label-md text-on-surface-variant uppercase tracking-wider">{{ $option['name'] }}</span>
                    <div class="text-headline-md font-headline-md mt-2">{{ $option['count'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50 border-b border-outline-variant/20">
                            <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Post</th>
                            <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Category</th>
                            <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Date</th>
                            <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10">
                        @forelse ($posts as $post)
                            <tr class="hover:bg-surface-container-low/30 transition-colors">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded bg-surface-container-high bg-cover bg-center flex-shrink-0"
                                            @if ($post->cover_image) style="background-image: url('{{ $post->cover_image }}')" @endif></div>
                                        <div>
                                            <a class="font-headline-md text-[18px] text-on-surface hover:text-primary transition-colors"
                                                href="{{ route('dashboard.posts.show', $post) }}">{{ $post->title }}</a>
                                            <div class="text-label-md text-on-surface-variant">/{{ $post->slug }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="bg-surface-container-high text-on-surface-variant px-3 py-1 rounded-full text-label-md">
                                        {{ $post->category?->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-on-surface-variant">{{ $post->created_at?->format('M d, Y') }}</td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full {{ $post->status === 'published' ? 'bg-tertiary' : ($post->status === 'archived' ? 'bg-on-surface-variant' : 'bg-primary/40') }}"></span>
                                        <span class="font-label-md text-label-md capitalize">{{ $post->status }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-end gap-2">
                                        <a class="p-2 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded-lg" title="View"
                                            href="{{ route('dashboard.posts.show', $post) }}">
                                            <span class="material-symbols-outlined">visibility</span>
                                        </a>
                                        <a class="p-2 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded-lg" title="Edit"
                                            href="{{ route('dashboard.posts.edit', $post) }}">
                                            <span class="material-symbols-outlined">edit_note</span>
                                        </a>
                                        <form action="{{ route('dashboard.posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-2 text-on-surface-variant hover:text-error hover:bg-error/5 rounded-lg" title="Delete" type="submit">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-14 text-center text-on-surface-variant" colspan="5">
                                    No posts yet. Start with a new draft.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-surface-container-low border-t border-outline-variant/20">
                {{ $posts->links() }}
            </div>
        </div>
    </main>
</body>

</html>
