<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;family=Hanken+Grotesk:wght@400;500;600;700&amp;display=swap"
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
            font-family: 'Hanken Grotesk', sans-serif;
        }

        .paper-card {
            background-color: #ffffff;
            box-shadow: 0 4px 20px -4px rgba(139, 14, 15, 0.05);
        }

        .font-headline {
            font-family: 'Libre Caslon Text', serif;
        }

        .font-ui {
            font-family: 'Hanken Grotesk', sans-serif;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen text-on-surface">
    <!-- TopNavBar -->
    <nav
        class="bg-paper-bright border-b border-outline-variant flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-20 fixed top-0 left-0 right-0 z-50">
        <div class="flex items-center gap-2">
            <span class="font-display-lg-mobile text-2xl font-bold text-primary tracking-tight">Ink &amp; Paper</span>
        </div>
        <div class="hidden md:flex items-center gap-10">
            <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 text-label-md"
                href="#">Feed</a>
            <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 text-label-md"
                href="#">Authors</a>
            <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 text-label-md"
                href="#">Dashboard</a>
        </div>
        <div class="flex items-center gap-6">
            <button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-all p-2"
                data-icon="notifications">notifications</button>
            <button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-all p-2"
                data-icon="bookmark">bookmark</button>
            <button
                class="hidden md:block bg-primary text-on-primary font-bold text-label-md px-6 py-2.5 rounded hover:bg-primary-container transition-all active:scale-95">Create
                Post</button>
        </div>
    </nav>
    <!-- Main Content Canvas -->
    <main class="flex-grow flex flex-col items-center justify-center pt-32 pb-section-gap px-gutter">
        <div class="w-full max-w-[480px]">
            <!-- Link Verification Success Banner -->
            <div
                class="mb-10 flex items-start gap-4 p-5 rounded bg-surface-container-low border border-outline-variant">
                <span class="material-symbols-outlined text-primary mt-0.5" data-icon="verified"
                    style="font-variation-settings: 'FILL' 1;">verified</span>
                <div>
                    <p class="font-bold text-label-md text-on-surface">Verification Successful</p>
                    <p class="text-body-md text-on-surface-variant mt-1">Your reset token has been verified. Please
                        provide your new credentials below.</p>
                </div>
            </div>
            <!-- Form Container -->
            <div class="paper-card border border-outline-variant p-10 md:p-14">
                <div class="mb-12 text-center">
                    <h1 class="font-headline text-headline-lg mb-4 text-on-surface">Reset Password</h1>
                    <p class="text-body-md text-on-surface-variant max-w-[320px] mx-auto">Update your security
                        credentials to regain access to your account.</p>
                </div>
                <form action="{{ route('password.update') }}" class="space-y-10" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="hidden" name="email" value="{{ old('email', $request->email) }}">
                    <!-- New Password -->
                    <div class="space-y-3">
                        <label class="block text-label-md font-bold uppercase tracking-widest text-on-surface-variant"
                            for="password">New Password</label>
                        <div class="relative">
                            <input
                                class="w-full px-4 py-4 bg-paper-bright border border-outline-variant rounded focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all text-body-md"
                                id="password" name="password" placeholder="Password" required=""
                                type="password" autocomplete="new-password">
                            <button
                                class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline"
                                data-icon="visibility" type="button">visibility</button>
                        </div>
                        @error('email')
                            <p class="text-body-md text-error">{{ $message }}</p>
                        @enderror
                        @error('password')
                            <p class="text-body-md text-error">{{ $message }}</p>
                        @enderror
                        <!-- Password Strength Indicator -->
                        <div class="pt-3">
                            <div class="flex gap-1.5 h-1 mb-3">
                                <div class="flex-1 bg-primary rounded-full"></div>
                                <div class="flex-1 bg-primary rounded-full"></div>
                                <div class="flex-1 bg-primary rounded-full"></div>
                                <div class="flex-1 bg-surface-container-highest rounded-full"></div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[16px] text-primary"
                                    data-icon="check_circle">check_circle</span>
                                <span class="text-label-md text-on-surface-variant">Strong security profile</span>
                            </div>
                        </div>
                    </div>
                    <!-- Confirm New Password -->
                    <div class="space-y-3">
                        <label class="block text-label-md font-bold uppercase tracking-widest text-on-surface-variant"
                            for="password_confirmation">Confirm Password</label>
                        <div class="relative">
                            <input
                                class="w-full px-4 py-4 bg-paper-bright border border-outline-variant rounded focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all text-body-md"
                                id="password_confirmation" name="password_confirmation" placeholder="Password" required=""
                                type="password" autocomplete="new-password">
                        </div>
                    </div>
                    <!-- Primary Action -->
                    <button
                        class="w-full bg-primary text-on-primary font-bold text-label-md py-5 rounded hover:bg-primary-container hover:shadow-xl transition-all active:scale-[0.98] uppercase tracking-widest"
                        type="submit">
                        Update Credentials
                    </button>
                </form>
                <div class="mt-12 text-center border-t border-outline-variant pt-8">
                    <a class="text-label-md font-bold text-on-surface-variant hover:text-primary transition-all inline-flex items-center gap-2 uppercase tracking-widest"
                        href="{{ route('login') }}">
                        <span class="material-symbols-outlined text-[18px]" data-icon="arrow_back">arrow_back</span>
                        Back to sign in
                    </a>
                </div>
            </div>
            <!-- Contextual Editorial Card -->
            <div class="mt-16">
                <div class="paper-card border border-outline-variant p-8 flex items-center gap-8">
                    <div class="w-20 h-20 overflow-hidden flex-shrink-0 grayscale">
                        <img alt="Security" class="w-full h-full object-cover"
                            data-alt="A macro close-up of a vintage typewriter key hitting white paper, captured in high-contrast black and white photography. The lighting is sharp and cinematic, highlighting the ink texture on the paper. The mood is professional, intellectual, and focused on security and detail. Minimalist editorial aesthetic consistent with high-end publishing."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDr3ZJ2_N4WBBdyo0CmryL-OZQiPenhzgosOjIQa_17BCJ-GnX-3hrdbmx9L6GJGIllFUmkfZqtI42hkgq90QzFVC0YrWqAUcwJmncntHKZ1qE3BmxH43xB5hVFFecgrk06ZnUEPR8Mfxzy2Ncm6cbCGtWOdVlQIdY5OejoRD2TMwrmQh7-56opJQg5OrbH26E1MfKY09pETWPraP80I-Sn0EiVHUyf5ZTQcYk9OSnyoMSSPG1LJqc2DwlOFioHP7Q_pzT9NN2Qc4s0">
                    </div>
                    <div>
                        <h4 class="text-label-md font-bold uppercase tracking-widest text-on-surface mb-2">Editorial
                            Notice</h4>
                        <p class="text-body-md text-on-surface-variant leading-relaxed">Protect your creative work. We
                            recommend rotating passwords quarterly and utilizing encrypted managers.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-paper-bright border-t border-outline-variant">
        <div
            class="w-full py-20 px-gutter max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-12">
            <div class="flex flex-col items-center md:items-start gap-4">
                <span class="font-headline text-headline-md text-primary">Ink &amp; Paper</span>
                <p class="text-label-md text-on-surface-variant">© 2024 Ink &amp; Paper Publishing Platform.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-10">
                <a class="text-label-md text-on-surface-variant hover:text-primary uppercase tracking-widest transition-all"
                    href="#">Journal</a>
                <a class="text-label-md text-on-surface-variant hover:text-primary uppercase tracking-widest transition-all"
                    href="#">Archives</a>
                <a class="text-label-md text-on-surface-variant hover:text-primary uppercase tracking-widest transition-all"
                    href="#">Legal</a>
                <a class="text-label-md text-on-surface-variant hover:text-primary uppercase tracking-widest transition-all"
                    href="#">Connect</a>
            </div>
        </div>
    </footer>
</body>

</html>
