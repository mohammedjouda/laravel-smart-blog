<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&amp;family=Libre+Caslon+Text:wght@400;700&amp;display=swap"
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
        }

        body {
            background-color: #fff8f7;
        }

        .editorial-shadow {
            box-shadow: 0 30px 60px -12px rgba(139, 14, 15, 0.04), 0 18px 36px -18px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body class="bg-background text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
    <div class="min-h-screen flex flex-col items-center justify-center p-gutter">
        <!-- Brand Identity -->
        <header class="mb-section-gap text-center">
            <h1
                class="font-display-lg-mobile text-display-lg-mobile md:font-display-lg md:text-display-lg text-primary mb-2 tracking-tight">
                Ink &amp; Paper</h1>
            <p class="font-label-md text-label-md text-secondary uppercase tracking-[0.2em]">Digital Quiet for Modern
                Thinkers</p>
        </header>
        <!-- Centered Card -->
        <main
            class="w-full max-w-[480px] bg-paper-bright border border-outline-variant rounded-xl p-8 md:p-margin-desktop editorial-shadow">
            <section class="mb-10 text-center">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-3">Create Account</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Join a community of thoughtful writers and
                    readers.</p>
            </section>
            <!-- Social Sign Up -->
            <div class="grid grid-cols-2 gap-4 mb-8">
                <button
                    class="flex items-center justify-center gap-3 py-3 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container-low transition-colors duration-200 focus:ring-1 focus:ring-primary focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="currentColor"></path>
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="currentColor"></path>
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.26.81-.58z"
                            fill="currentColor"></path>
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="currentColor"></path>
                    </svg>
                    Google
                </button>
                <button
                    class="flex items-center justify-center gap-3 py-3 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container-low transition-colors duration-200 focus:ring-1 focus:ring-primary focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z"
                            fill="currentColor"></path>
                    </svg>
                    Twitter
                </button>
            </div>
            <div class="relative flex items-center justify-center mb-8">
                <hr class="w-full border-outline-variant/50">
                <span
                    class="absolute px-4 bg-paper-bright font-label-md text-[11px] text-secondary/70 uppercase tracking-widest">or
                    continue with email</span>
            </div>
            <!-- Registration Form -->
            <form action="{{ route('register.store') }}" class="space-y-stack-lg" method="POST">
                @csrf
                <div>
                    <label class="block font-label-md text-label-md text-on-surface mb-2" for="name">Full
                        Name</label>
                    <input
                        class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface-container-lowest focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-body-md placeholder:text-outline/50"
                        id="name" name="name" placeholder="E.g. Julian Barnes" required="" type="text" value="{{ old('name') }}" autofocus autocomplete="name">
                    @error('name')
                        <p class="mt-2 font-body-md text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface mb-2" for="email">Email
                        Address</label>
                    <input
                        class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface-container-lowest focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-body-md placeholder:text-outline/50"
                        id="email" name="email" placeholder="julian@inkandpaper.com" required=""
                        type="email" value="{{ old('email') }}" autocomplete="username">
                    @error('email')
                        <p class="mt-2 font-body-md text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface mb-2"
                        for="password">Password</label>
                    <div class="relative">
                        <input
                            class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface-container-lowest focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-body-md placeholder:text-outline/50"
                            id="password" name="password" placeholder="At least 12 characters" required=""
                            type="password" autocomplete="new-password">
                        <button
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 font-body-md text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block font-label-md text-label-md text-on-surface mb-2"
                        for="password_confirmation">Confirm Password</label>
                    <input
                        class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface-container-lowest focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-body-md placeholder:text-outline/50"
                        id="password_confirmation" name="password_confirmation" placeholder="Repeat your password"
                        required="" type="password" autocomplete="new-password">
                </div>
                <div class="pt-2">
                    <button
                        class="w-full bg-primary-container text-on-primary py-4 rounded-lg font-label-md text-label-md hover:bg-primary active:scale-[0.98] transition-all shadow-lg shadow-primary-container/10"
                        type="submit">
                        Create Account
                    </button>
                </div>
            </form>
            <footer class="mt-margin-desktop text-center">
                <p class="font-body-md text-body-md text-on-surface-variant">
                    Already have an account?
                    <a class="font-label-md text-primary hover:underline ml-1" href="{{ route('login') }}">Log in</a>
                </p>
                <p
                    class="mt-6 font-label-md text-[11px] text-secondary/60 leading-relaxed max-w-[280px] mx-auto uppercase tracking-wide">
                    By clicking "Create Account", you agree to our
                    <a class="underline decoration-outline/30 hover:decoration-primary" href="#">Terms of
                        Service</a> and
                    <a class="underline decoration-outline/30 hover:decoration-primary" href="#">Privacy
                        Policy</a>.
                </p>
            </footer>
        </main>
        <!-- Semantic Footer -->
        <footer
            class="w-full py-12 px-gutter max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-4 mt-8 border-t border-outline-variant/30">
            <span class="font-label-md text-[12px] text-secondary/70">© 2024 Ink &amp; Paper Platform. All rights
                reserved.</span>
            <nav class="flex gap-6">
                <a class="font-label-md text-[12px] text-secondary/70 hover:text-primary transition-all"
                    href="#">About</a>
                <a class="font-label-md text-[12px] text-secondary/70 hover:text-primary transition-all"
                    href="#">Privacy</a>
                <a class="font-label-md text-[12px] text-secondary/70 hover:text-primary transition-all"
                    href="#">Terms</a>
                <a class="font-label-md text-[12px] text-secondary/70 hover:text-primary transition-all"
                    href="#">Help</a>
            </nav>
        </footer>
    </div>
    <!-- Decorative Elements -->
    <div class="fixed top-0 left-0 w-full h-[6px] bg-primary-container/20 pointer-events-none"></div>
    <div class="fixed bottom-0 left-0 w-full h-px bg-outline-variant/20 pointer-events-none"></div>
</body>

</html>
