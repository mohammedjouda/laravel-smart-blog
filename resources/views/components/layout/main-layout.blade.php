<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Paperink — Home Feed</title>
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;family=Hanken+Grotesk:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            vertical-align: middle;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary": "#ffffff",
                        "tertiary-container": "#00685e",
                        "on-error": "#ffffff",
                        "inverse-primary": "#ffb4ab",
                        "inverse-on-surface": "#ffedea",
                        "tertiary": "#004e46",
                        "on-secondary-fixed": "#1c1b1c",
                        "on-surface": "#261817",
                        "on-primary-container": "#ffc8c1",
                        "primary-fixed": "#ffdad5",
                        "surface-container": "#efeded",
                        "surface-bright": "#fff8f7",
                        "on-secondary-fixed-variant": "#474647",
                        "surface-dim": "#eed4d1",
                        "paper-bright": "#ffffff",
                        "surface-variant": "#f6ddd9",
                        "on-tertiary-fixed": "#00201c",
                        "error-container": "#ffdad6",
                        "error": "#ba1a1a",
                        "on-secondary-container": "#636262",
                        "on-surface-variant": "#59413e",
                        "surface-tint": "#b02c26",
                        "outline-variant": "#e1bfba",
                        "background": "#fff8f7",
                        "primary-container": "#ad2a24",
                        "on-primary": "#ffffff",
                        "tertiary-fixed": "#a1f1e4",
                        "tertiary-fixed-dim": "#85d5c8",
                        "on-tertiary-fixed-variant": "#005048",
                        "secondary": "#5f5e5e",
                        "on-primary-fixed-variant": "#8e1211",
                        "surface-container-lowest": "#ffffff",
                        "on-background": "#261817",
                        "primary": "#8b0e0f",
                        "surface-container-highest": "#f6ddd9",
                        "surface-container-high": "#fce2df",
                        "on-primary-fixed": "#410002",
                        "outline": "#8d706d",
                        "secondary-fixed": "#e5e2e1",
                        "on-tertiary": "#ffffff",
                        "inverse-surface": "#3c2d2b",
                        "secondary-fixed-dim": "#c8c6c6",
                        "surface-container-low": "#fff0ee",
                        "surface": "#fbf9f9",
                        "primary-fixed-dim": "#ffb4ab",
                        "on-error-container": "#93000a",
                        "secondary-container": "#e2dfdf",
                        "on-tertiary-container": "#93e4d7"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-sm": "8px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "stack-lg": "24px",
                        "stack-md": "16px",
                        "container-max": "1200px",
                        "section-gap": "80px",
                        "margin-desktop": "40px"
                    },
                    "fontFamily": {
                        "headline-md": ["Libre Caslon Text"],
                        "display-lg": ["Libre Caslon Text"],
                        "label-md": ["Hanken Grotesk"],
                        "display-lg-mobile": ["Libre Caslon Text"],
                        "body-lg": ["Hanken Grotesk"],
                        "headline-lg": ["Libre Caslon Text"],
                        "body-md": ["Hanken Grotesk"]
                    },
                    "fontSize": {
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["56px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "label-md": ["13px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "0.05em",
                            "fontWeight": "500"
                        }],
                        "display-lg-mobile": ["36px", {
                            "lineHeight": "1.1",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "body-md": ["15px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
</head>

<body class="bg-background text-on-surface font-body-md overflow-x-hidden">
    <!-- Top Navigation Bar -->
    <nav class="bg-background dark:bg-background border-b border-outline-variant/30 docked full-width top-0 z-50">
        <div class="flex justify-between items-center w-full px-margin-desktop py-4 max-w-container-max mx-auto">
            <!-- Brand & Search -->
            <div class="flex items-center gap-stack-lg flex-1">
                <span
                    class="font-headline-lg text-headline-lg font-bold text-on-surface dark:text-inverse-on-surface">Paperink</span>
                <div
                    class="hidden md:flex items-center bg-surface-container-low px-4 py-2 rounded-full border border-outline-variant/20 w-80">
                    <span class="material-symbols-outlined text-on-surface-variant mr-2">search</span>
                    <input
                        class="bg-transparent border-none outline-none text-body-md w-full placeholder:text-on-surface-variant/50 focus:ring-0"
                        placeholder="Search articles, tags, authors" type="text">
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center gap-gutter px-8">
                <a class="text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary py-1 hover:text-primary transition-colors font-label-md text-label-md"
                    href="#">Feed</a>
                <a class="text-on-surface-variant dark:text-on-secondary-container font-label-md text-label-md hover:text-primary transition-colors"
                    href="#">Authors</a>
                <a class="text-on-surface-variant dark:text-on-secondary-container font-label-md text-label-md hover:text-primary transition-colors"
                    href="#">Dashboard</a>
                <a class="text-on-surface-variant dark:text-on-secondary-container font-label-md text-label-md hover:text-primary transition-colors"
                    href="#">Profile</a>
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-stack-md">
                <button
                    class="bg-primary-container text-on-primary px-6 py-2 rounded-full font-label-md text-label-md hover:bg-primary transition-all active:scale-95 duration-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">edit</span>
                    Write
                </button>
                <div class="flex items-center gap-2">
                    <span
                        class="material-symbols-outlined text-on-surface-variant text-3xl cursor-pointer hover:text-primary transition-colors">account_circle</span>
                </div>
            </div>
        </div>
    </nav>
    {{ $slot }}

    <!-- Footer -->
    <footer
        class="bg-surface-container-low dark:bg-surface-container-low border-t border-outline-variant/20 mt-section-gap">
        <div
            class="grid grid-cols-2 md:grid-cols-5 gap-gutter w-full px-margin-desktop py-section-gap max-w-container-max mx-auto">
            <!-- Brand Column -->
            <div class="col-span-2 flex flex-col gap-stack-lg">
                <span
                    class="font-headline-md text-headline-md font-bold text-on-surface dark:text-inverse-on-surface">Paperink</span>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-xs">
                    Refined thoughts for the curious mind. Join our community of over 50k readers.
                </p>
                <div class="flex flex-col gap-3 mt-4">
                    <span class="font-label-md text-label-md font-bold uppercase tracking-wider">Subscribe to our
                        newsletter</span>
                    <div class="flex gap-0 border border-outline-variant/30 rounded-lg overflow-hidden max-w-sm">
                        <input class="bg-paper-bright flex-1 px-4 py-2 border-none focus:ring-0 text-body-md"
                            placeholder="Email address" type="email">
                        <button
                            class="bg-on-surface text-white px-6 py-2 font-label-md text-label-md hover:bg-primary transition-colors">Join</button>
                    </div>
                </div>
            </div>
            <!-- Links Column 1 -->
            <div class="flex flex-col gap-4">
                <h5 class="font-label-md text-label-md font-bold text-on-surface">Product</h5>
                <nav class="flex flex-col gap-2">
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Features</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Integrations</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Pricing</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Changelog</a>
                </nav>
            </div>
            <!-- Links Column 2 -->
            <div class="flex flex-col gap-4">
                <h5 class="font-label-md text-label-md font-bold text-on-surface">Company</h5>
                <nav class="flex flex-col gap-2">
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">About</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Careers</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Blog</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Contact</a>
                </nav>
            </div>
            <!-- Links Column 3 -->
            <div class="flex flex-col gap-4">
                <h5 class="font-label-md text-label-md font-bold text-on-surface">Legal</h5>
                <nav class="flex flex-col gap-2">
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Privacy Policy</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Terms of Service</a>
                    <a class="text-on-surface-variant font-label-md text-label-md hover:underline hover:text-primary transition-opacity"
                        href="#">Cookie Policy</a>
                </nav>
            </div>
        </div>
        <div
            class="max-w-container-max mx-auto px-margin-desktop py-8 border-t border-outline-variant/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="font-label-md text-label-md text-on-surface-variant">© 2024 Paperink Media Inc. All rights
                reserved.</span>
            <div class="flex gap-6">
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">
                    <span class="material-symbols-outlined">alternate_email</span>
                </a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">
                    <span class="material-symbols-outlined">public</span>
                </a>
            </div>
        </div>
    </footer>
    <script>
        // Micro-interactions and effects
        document.addEventListener('DOMContentLoaded', () => {
            const articles = document.querySelectorAll('article');
            articles.forEach(article => {
                article.addEventListener('mousedown', () => {
                    article.style.transform = 'scale(0.99)';
                });
                article.addEventListener('mouseup', () => {
                    article.style.transform = 'scale(1)';
                });
                article.addEventListener('mouseleave', () => {
                    article.style.transform = 'scale(1)';
                });
            });

            // Smooth header visibility on scroll
            let lastScroll = 0;
            const header = document.querySelector('nav');
            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                if (currentScroll > lastScroll && currentScroll > 100) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                header.style.transition = 'transform 0.3s ease-in-out';
                lastScroll = currentScroll;
            });
        });
    </script>
</body>

</html>
