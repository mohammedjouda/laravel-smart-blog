<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Edit Post | Paperink</title>
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
                        'outline-variant': '#e1bfba',
                        error: '#ba1a1a',
                        'error-container': '#ffdad6',
                    },
                    fontFamily: {
                        'headline-lg': ['Libre Caslon Text'],
                        'headline-md': ['Libre Caslon Text'],
                        'body-md': ['Hanken Grotesk'],
                        'body-lg': ['Hanken Grotesk'],
                        'label-md': ['Hanken Grotesk'],
                    },
                    fontSize: {
                        'display-lg': ['56px', { lineHeight: '1.1', fontWeight: '700' }],
                        'display-lg-mobile': ['36px', { lineHeight: '1.1', fontWeight: '700' }],
                        'headline-lg': ['32px', { lineHeight: '1.2', fontWeight: '700' }],
                        'body-lg': ['18px', { lineHeight: '1.6' }],
                        'body-md': ['15px', { lineHeight: '1.5' }],
                        'label-md': ['13px', { lineHeight: '1.2', letterSpacing: '0.05em', fontWeight: '500' }],
                    },
                    spacing: {
                        gutter: '24px',
                        'margin-desktop': '40px',
                        'container-max': '1200px',
                        'stack-lg': '24px',
                        'stack-sm': '8px',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background text-on-surface font-body-md min-h-screen">
    <header class="sticky top-0 z-50 bg-background border-b border-outline-variant/30">
        <nav class="flex justify-between items-center w-full px-margin-desktop py-4 max-w-container-max mx-auto">
            <a class="font-headline-lg text-headline-lg font-bold text-on-surface" href="{{ route('home') }}">Paperink</a>
            <div class="flex items-center gap-4">
                <a class="text-on-surface-variant font-label-md hover:text-primary" href="{{ route('dashboard.posts.show', $post) }}">View</a>
                <button form="post-form" class="px-6 py-2 rounded-lg bg-primary-container text-on-primary font-label-md hover:bg-primary transition-all" type="submit">Save</button>
            </div>
        </nav>
    </header>

    <main class="max-w-container-max mx-auto px-margin-desktop py-12">
        <div class="mb-10">
            <p class="font-label-md text-label-md text-primary uppercase tracking-widest">Editing</p>
            <h1 class="font-headline-lg text-headline-lg mt-2">{{ $post->title }}</h1>
        </div>

        <form id="post-form" action="{{ route('dashboard.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('dashboard.posts._form', ['submitLabel' => 'Save Post'])
        </form>
    </main>
</body>

</html>
