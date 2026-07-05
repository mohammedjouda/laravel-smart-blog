<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Forgot Password - Ink &amp; Paper</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&amp;family=Libre+Caslon+Text:wght@400;700&amp;display=swap"
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
            display: inline-block;
            vertical-align: middle;
        }

        body {
            background-color: #fff8f7;
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body-md selection:bg-primary-fixed selection:text-primary">
    <!-- Top Navigation Bar -->
    <header
        class="bg-surface-container-lowest/80 backdrop-blur-md border-b border-outline-variant w-full h-20 fixed top-0 z-50">
        <div class="flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-full">
            <div class="font-display-lg text-[24px] tracking-tight font-bold text-on-surface">Ink &amp; Paper</div>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-300 flex items-center gap-2"
                href="{{ route('login') }}">
                <span class="material-symbols-outlined !text-[20px]" data-icon="arrow_back">arrow_back</span>
                Back to Login
            </a>
        </div>
    </header>
    <main class="min-h-screen flex items-center justify-center pt-24 pb-12 px-margin-mobile">
        <div class="w-full max-w-[480px] flex flex-col gap-12">
            <!-- Branding/Icon Section -->
            <div class="flex flex-col items-center text-center gap-6">
                <div
                    class="w-20 h-20 rounded-full bg-surface-container flex items-center justify-center border border-outline-variant">
                    <span class="material-symbols-outlined text-primary text-[36px]"
                        data-icon="lock_reset">lock_reset</span>
                </div>
                <div class="space-y-3">
                    <h1 class="font-headline-lg text-headline-lg text-on-surface">Reset password</h1>
                    <p class="font-body-md text-on-surface-variant max-w-[340px] mx-auto leading-relaxed">
                        Enter the email address associated with your account and we'll send you a link to reset your
                        password.
                    </p>
                </div>
            </div>
            <!-- Form Section -->
            <div class="bg-white p-10 border border-outline-variant rounded-xl shadow-[0_4px_24px_rgba(38,24,23,0.04)]">
                @if (session('status'))
                    <div class="mb-6 rounded-lg border border-tertiary-fixed-dim bg-tertiary-fixed/40 px-4 py-3 font-body-md text-tertiary">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="flex flex-col gap-8" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-2.5">
                        <label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest"
                            for="email">Email Address</label>
                        <input
                            class="w-full h-14 px-4 bg-background border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all font-body-md text-on-surface placeholder:text-outline/50"
                            id="email" name="email" placeholder="name@company.com" required="" type="email" value="{{ old('email') }}" autofocus autocomplete="username">
                        @error('email')
                            <p class="font-body-md text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button
                        class="w-full h-14 bg-primary-container hover:bg-primary text-on-primary font-label-md text-[16px] rounded-lg transition-all active:scale-[0.99] shadow-sm tracking-wide"
                        type="submit">
                        Send Reset Link
                    </button>
                </form>
            </div>
            <!-- Supporting Illustration -->
            <div
                class="relative w-full h-56 rounded-xl overflow-hidden grayscale opacity-30 hover:opacity-60 transition-all duration-1000 group border border-outline-variant">
                <img alt="Minimalist study space"
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                    data-alt="A clean, minimalist workspace featuring a stack of high-quality cream-colored paper and a sleek black ink pen resting on top. The scene is shot from a high angle with soft, bright natural lighting coming from a side window, creating delicate shadows. The aesthetic is monochromatic and quiet, emphasizing the Paper and Ink theme of the platform. The overall mood is focused, serene, and professional."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBa4NDSej0z5gbXHGBYJI-znfvY5P2CQXiE3l4Y8BBTagXhBklDJANDqUqvZ6RV0ij63Z3KiOVcNReu0hHTvQVJZbdqeQbMmRQuJgZhJD_sbqA5t91oxufjBC-e6YitreIJIHMcqYlUdMuZV9LqaW6GQ2SXV5gRVjjEJPVN_Cb621vR71s-08ugKIUQPG81_N3BpyM_HTAmaYLGVvtw2VJd1GOe2Mum79WovoT-PHVyq9goKJEbb1MmOcZB28PmCU6E10nNQ05oc8KF">
            </div>
            <!-- Footer Link -->
            <div class="text-center">
                <a class="font-label-md text-label-md text-secondary hover:text-primary underline underline-offset-4 transition-all"
                    href="{{ route('login') }}">
                    I remember my password
                </a>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer
        class="w-full py-16 px-gutter max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-8 border-t border-outline-variant mt-24">
        <div class="font-headline-md text-headline-md text-on-surface">Ink &amp; Paper</div>
        <div class="flex gap-8">
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all"
                href="#">About</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all"
                href="#">Privacy</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all"
                href="#">Terms</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all"
                href="#">Help</a>
        </div>
        <div class="font-label-md text-label-md text-on-surface-variant/60">
            © 2024 Ink &amp; Paper Platform. All rights reserved.
        </div>
    </footer>
</body>

</html>
