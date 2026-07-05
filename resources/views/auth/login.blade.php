<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Ink &amp; Paper</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;family=Hanken+Grotesk:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "error-container": "#ffdad6",
                        "surface-bright": "#fff8f7",
                        "paper-bright": "#ffffff",
                        "on-primary-fixed-variant": "#8e1211",
                        "on-secondary-container": "#636262",
                        "inverse-surface": "#3c2d2b",
                        "error": "#ba1a1a",
                        "secondary-container": "#e2dfdf",
                        "inverse-primary": "#ffb4ab",
                        "tertiary-container": "#00685e",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#85d5c8",
                        "primary-fixed-dim": "#ffb4ab",
                        "on-surface-variant": "#59413e",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#fff0ee",
                        "on-tertiary-fixed-variant": "#005048",
                        "primary-fixed": "#ffdad5",
                        "tertiary-fixed": "#a1f1e4",
                        "surface-container": "#efeded",
                        "primary-container": "#ad2a24",
                        "primary": "#8b0e0f",
                        "secondary-fixed": "#e5e2e1",
                        "surface-variant": "#f6ddd9",
                        "surface-tint": "#b02c26",
                        "background": "#fff8f7",
                        "on-primary-fixed": "#410002",
                        "secondary-fixed-dim": "#c8c6c6",
                        "on-background": "#261817",
                        "on-tertiary-fixed": "#00201c",
                        "surface-container-high": "#fce2df",
                        "on-surface": "#261817",
                        "on-primary-container": "#ffc8c1",
                        "on-tertiary-container": "#93e4d7",
                        "on-error-container": "#93000a",
                        "surface-container-highest": "#f6ddd9",
                        "tertiary": "#004e46",
                        "on-secondary-fixed": "#1c1b1c",
                        "on-secondary-fixed-variant": "#474647",
                        "outline": "#8d706d",
                        "surface": "#fbf9f9",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#ffedea",
                        "secondary": "#5f5e5e",
                        "surface-dim": "#eed4d1",
                        "outline-variant": "#e1bfba"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "margin-desktop": "40px",
                        "stack-sm": "8px",
                        "stack-lg": "24px",
                        "section-gap": "80px",
                        "stack-md": "16px",
                        "container-max": "1200px",
                        "margin-mobile": "16px"
                    },
                    "fontFamily": {
                        "display-lg-mobile": ["Libre Caslon Text"],
                        "label-md": ["Hanken Grotesk"],
                        "headline-md": ["Libre Caslon Text"],
                        "display-lg": ["Libre Caslon Text"],
                        "headline-lg": ["Libre Caslon Text"],
                        "body-md": ["Hanken Grotesk"],
                        "body-lg": ["Hanken Grotesk"]
                    },
                    "fontSize": {
                        "display-lg-mobile": ["36px", {
                            "lineHeight": "1.1",
                            "fontWeight": "700"
                        }],
                        "label-md": ["13px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "0.05em",
                            "fontWeight": "500"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["56px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "body-md": ["15px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        body {
            background-color: #fff8f7;
        }
    </style>
</head>

<body class="font-body-md text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
    <!-- Top Navigation -->
    <header class="bg-surface-bright border-b border-outline-variant sticky top-0 z-50">
        <div class="flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-20">
            <span class="font-display-lg-mobile text-[24px] font-bold text-primary">&nbsp;Ink &amp; Paper</span>
            <div class="hidden md:flex gap-8 items-center">
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
                    href="#">Help Center</a>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="min-h-[calc(100vh-160px)] flex flex-col items-center justify-center py-section-gap px-gutter">
        <div class="w-full max-w-[460px]">
            <!-- Login Card -->
            <div
                class="bg-paper-bright border border-outline-variant p-10 md:p-12 rounded-xl shadow-[0_10px_40px_-15px_rgba(139,14,15,0.08)]">
                <div class="mb-10 text-center">
                    <h1 class="font-headline-lg text-headline-lg text-on-surface mb-3">Welcome back</h1>
                    <p class="font-body-md text-secondary">Sign in to your editorial workspace.</p>
                </div>
                @if (session('status'))
                    <div class="mb-6 rounded-lg border border-tertiary-fixed-dim bg-tertiary-fixed/40 px-4 py-3 font-body-md text-tertiary">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('login.store') }}" class="space-y-6" method="POST">
                    @csrf
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label
                            class="font-label-md text-label-md text-on-surface-variant block uppercase tracking-wider"
                            for="email">Email Address</label>
                        <input
                            class="w-full h-14 px-4 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none transition-all font-body-md text-on-surface placeholder:text-outline/50"
                            id="email" name="email" placeholder="name@domain.com" required="" type="email" value="{{ old('email') }}" autofocus autocomplete="username">
                        @error('email')
                            <p class="font-body-md text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider"
                                for="password">Password</label>
                            <a class="font-label-md text-label-md text-primary hover:text-on-primary-fixed-variant transition-all underline underline-offset-4"
                                href="{{ route('password.request') }}">Forgot?</a>
                        </div>
                        <input
                            class="w-full h-14 px-4 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none transition-all font-body-md text-on-surface placeholder:text-outline/50"
                            id="password" name="password" placeholder="Password" required="" type="password" autocomplete="current-password">
                        @error('password')
                            <p class="font-body-md text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Remember Me -->
                    <div class="flex items-center gap-3 py-2">
                        <input
                            class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary transition-all cursor-pointer"
                            id="remember" name="remember" type="checkbox">
                        <label class="font-body-md text-on-surface-variant select-none cursor-pointer"
                            for="remember">Remember for 30 days</label>
                    </div>
                    <!-- Primary Action -->
                    <button
                        class="w-full h-14 bg-primary-container text-white font-label-md text-[16px] rounded-lg hover:bg-primary active:scale-[0.98] transition-all flex justify-center items-center gap-2 shadow-sm"
                        type="submit">
                        Sign In
                    </button>
                </form>
                <!-- Divider -->
                <div class="relative my-10">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-outline-variant/60"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span
                            class="bg-paper-bright px-4 font-label-md text-[11px] text-outline uppercase tracking-[0.2em]">or
                            access via</span>
                    </div>
                </div>
                <!-- Social Logins -->
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="h-14 border border-outline-variant flex items-center justify-center gap-3 font-label-md text-on-surface hover:bg-surface-container-low transition-all rounded-lg">
                        <span class="material-symbols-outlined text-[20px]" data-icon="cloud">cloud</span>
                        Google
                    </button>
                    <button
                        class="h-14 border border-outline-variant flex items-center justify-center gap-3 font-label-md text-on-surface hover:bg-surface-container-low transition-all rounded-lg">
                        <span class="material-symbols-outlined text-[20px]" data-icon="terminal">terminal</span>
                        Github
                    </button>
                </div>
                <!-- Footer Link -->
                <div class="mt-12 text-center">
                    <p class="font-body-md text-on-surface-variant">
                        New to Ink &amp; Paper?
                        <a class="text-primary font-bold hover:underline transition-all ml-1 underline-offset-4"
                            href="{{ route('register') }}">Create an Account</a>
                    </p>
                </div>
            </div>
            <!-- Transactional Context Image -->
            <div class="mt-16 opacity-30 grayscale hover:opacity-50 transition-opacity duration-700">
                <img alt="Inspiration" class="w-full h-24 object-cover rounded-lg border border-outline-variant"
                    data-alt="A macro close-up of a high-quality fountain pen tip resting on textured ivory-colored paper. The scene is shot in a bright, minimalist studio with soft diffused lighting, emphasizing the sharp contrast between the dark ink and the clean white surface. The atmosphere is quiet and professional, reflecting a premium editorial and creative writing environment. Subtle shadows add depth to the minimal monochromatic palette."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaZzKZpXNwoxBOGg9qTCZOzjVtZgaq3v5K8sIDlTkB84CPOVf_AboEgvK7uVkq_-xo579Nl8Lo_BtjUxPflCR4Vgbs6kRK6ky6zyEvGrEfWMFD3oPgLRwRAb-c4f8jO73qjl1LwUEEI32HZaEuxonXTXoetuE3qdUGsu4Ec9HO4UuTL2phazkyVjlixFHaaGQ94g5tBW6pagkXvkhyBeSbasPRz9MmVa4P2sa8aFZocu96y0agSrKIXhQjp8QNtmD-Yzbod-SeXTOE">
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-surface-bright border-t border-outline-variant">
        <div
            class="w-full py-16 px-gutter max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <span class="font-headline-md text-on-surface opacity-80">Ink &amp; Paper</span>
            <div class="flex gap-8">
                <a class="font-body-md text-secondary hover:text-primary transition-all" href="#">About</a>
                <a class="font-body-md text-secondary hover:text-primary transition-all" href="#">Privacy</a>
                <a class="font-body-md text-secondary hover:text-primary transition-all" href="#">Terms</a>
                <a class="font-body-md text-secondary hover:text-primary transition-all" href="#">Help</a>
            </div>
            <p class="font-label-md text-outline">© 2024 Ink &amp; Paper Platform</p>
        </div>
    </footer>


</body>

</html>
