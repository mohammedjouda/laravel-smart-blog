@props([
    'articles' => [
        [
            'title' => 'The Resurgence of Serif Fonts in High-Contrast Digital Interfaces',
            'published_at' => 'May 10, 2024',
            'content' => 'How modern
                high-resolution displays are bringing back the elegance of the serif, and why readability is
                the new luxury.',
            'author' => 'Elena Vance',
            'category' => 'Typography',
            'read_at' => '5 min read',
        ],
        [
            'title' => 'Curating Your Digital Canvas: A Guide to Focused Workspaces',
            'published_at' => 'May 08, 2024',
            'content' => 'Reducing cognitive
                load through environmental design. Learn how to strip away the non-essential from your
                workflow.',
            'author' => 'Marcus Chen',
            'category' => 'Productivity',
            'read_at' => '12 min read',
        ],
    ],
])


    <!-- Left Feed Column -->
    <div class="lg:col-span-8 flex flex-col gap-16">
        <!-- Article 1 -->
        <article class="grid grid-cols-1 md:grid-cols-[1fr_200px] gap-8 group cursor-pointer">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 font-label-md text-[12px] text-on-surface-variant">
                    <img class="w-6 h-6 rounded-full object-cover"
                        data-alt="Jiro Tanaka portrait, professional tech writer and engineer, high quality editorial headshot."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6gvIzIKzfQirlZZiG8iBG_nadbOrJ3mcfK1SasFMMtoFgmUFLjr1myczShtkyvodf5l1-_Cc-USZbZw1UfKpZmrOBpB1Izni7mLJ2lBya3sWaVPZVQKGr3EJePjhZW4xTaF5BoMZrsaSMOwONmMw96FIC0fFrzSvHxM37wiT1wiVWsqdNKQiBEiIG5NjkRAieql_ms-IOouVMV1Sj5X-BfO9pZJIbF8NcGVJcxsq9JU7dp5c5anDMy5JITfkV8X2EhVk7QjBkptc">
                    <span class="text-on-surface font-bold">Jiro Tanaka</span>
                    <span class="opacity-50">·</span>
                    <span>Jun 9</span>
                </div>
                <h2 class="font-headline-md text-headline-md group-hover:text-primary transition-colors">
                    Rebuilding Our Event Pipeline From Scratch</h2>
                <p class="font-body-md text-on-surface-variant line-clamp-3">
                    A frank retrospective on tearing down two years of architectural assumptions — and what we
                    kept. We discovered that simple queues often outperform complex microservices.
                </p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-4">
                        <span
                            class="bg-surface-container-high px-3 py-1 rounded-full font-label-md text-[11px] text-on-surface-variant">#engineering</span>
                        <span class="font-label-md text-[12px] text-on-surface-variant">14 min read</span>
                    </div>
                    <div class="flex items-center gap-4 text-on-surface-variant">
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">bookmark</span>
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">more_horiz</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block w-full h-32 rounded-lg overflow-hidden bg-surface-container-low">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    data-alt="A minimalist abstract 3D render representing data flow and network pipelines. It features sleek, glowing filaments of teal and dark blue light weaving through a dark, textured void. The aesthetic is sophisticated, futuristic, and highly editorial, matching the technological theme of the article."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAp3MTRME82olBmAI-cldQ9xtOe7loPxN1DVmwaQJTZDywtZyQM3YbRNOdlLhsX6s7HFSowanI3irF2ABs-qoI1TjH13yNaHxliX1vNLlqIDMNW5hbPZBM8cxfAwQrlbxNiHv1Ud7KoInvxJhXWMzMYG_Rs0Bg6C6H7JqTun0DZ7E3hs788_IczIi_E5C2A1CeAyt9F1ZpCvkvMFtvxqrY5xMk0UEqW1fl_v3s6UyD-d0P0sIba0vZRauSakJuNAeKt1PqHuGqwqok">
            </div>
        </article>
        <!-- Article 2 -->
        <article class="grid grid-cols-1 md:grid-cols-[1fr_200px] gap-8 group cursor-pointer">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 font-label-md text-[12px] text-on-surface-variant">
                    <img class="w-6 h-6 rounded-full object-cover"
                        data-alt="Amara Okafor portrait, editorial style headshot of a writer."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGj103ntwI2tR9rPB7ipyqRCOp9GK7AWHbcUnjmvnNee7wG3uxRMA1xEgbiZrJaONhJCkKJjkWksi1p5RJ4YKpEYP5Gqwwgg1CkQJCKLDDY3mUK6JPXC7QE8KHG6RLshBw2AeI8jMH4ut0oj8M1DZUoXCYIqzFXoPDvG2iHXtp5WtWuRPgKRZRv4gvqT5XRrr_DxnZ_20935TGGY6K0FkBhqIH28dd8VDOWF3NuN4Eeo8hzq1edz6VYwHhnp1WNZY5F51ZVf2lVYU">
                    <span class="text-on-surface font-bold">Amara Okafor</span>
                    <span class="opacity-50">·</span>
                    <span>Jun 7</span>
                </div>
                <h2 class="font-headline-md text-headline-md group-hover:text-primary transition-colors">
                    Writing Is Thinking, Out Loud</h2>
                <p class="font-body-md text-on-surface-variant line-clamp-3">
                    On keeping a public notebook, the discipline of finishing drafts, and the readers you never
                    meet. The process of externalizing thoughts is the only way to refine them.
                </p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-4">
                        <span
                            class="bg-surface-container-high px-3 py-1 rounded-full font-label-md text-[11px] text-on-surface-variant">#writing</span>
                        <span class="font-label-md text-[12px] text-on-surface-variant">6 min read</span>
                    </div>
                    <div class="flex items-center gap-4 text-on-surface-variant">
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">bookmark</span>
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">more_horiz</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block w-full h-32 rounded-lg overflow-hidden bg-surface-container-low">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    data-alt="An artistic, conceptual photograph of a stack of vintage papers and an ink pen on a clean, light-colored desk. The lighting is bright and airy, with soft shadows. The image captures the essence of literary thought and refined writing, using a warm paper-tone palette consistent with the Paperink brand."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLs1bf0aTs9vvDFoPKSqbrbTiu6YQmEV32j69czzNgymGdMwXDw3GA4sM62sTaVP5ZH11WeZ0UxNRyX__CM783Ymtuz_VA3bqgEu-zmKKiGc-Mf75sNLgnqij0SfxKfh3P_djtuhfL3RNzHoRpB2qBgTn7cH6MkfYy_PMFNFJul6FvyZ-PnVb-UBU-RLos4iZ8e1ThaazT5hmByBnn-TtEcdGCS7DsOZ9boDRwEljFV1d_gtprySyWac1rEBokjd11J_Qa8maVnYk">
            </div>
        </article>
        <!-- Article 3 -->
        <article class="grid grid-cols-1 md:grid-cols-[1fr_200px] gap-8 group cursor-pointer">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 font-label-md text-[12px] text-on-surface-variant">
                    <img class="w-6 h-6 rounded-full object-cover"
                        data-alt="Noah Lindberg portrait, professional editorial photo."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBC-gSQMdTAlQp0v3vv70TWMoQZVjuw7W7R5mEjlZJDu5VjPKhmvqm4f_75eD00cjAdbKzpGVEjCZ1X6--PmCsCwbWhs_jjsX3OhNFqd4BVKmJ5VWs3v43BhF9K8qYzCO2UOwfyRCkM9P74w2aAf4uMs_paFQxHo_67Nm7h9f-eNyenfjBF904vrEWlNRemgSctS87W77c95Q2O9x-c9OEetEplK8F8-CY1efuHE_XZCIqB3wYnOq6DYCxTOVRUx5aC19f3jZ2bvww">
                    <span class="text-on-surface font-bold">Noah Lindberg</span>
                    <span class="opacity-50">·</span>
                    <span>Jun 4</span>
                </div>
                <h2 class="font-headline-md text-headline-md group-hover:text-primary transition-colors">The
                    Economics of Small Software</h2>
                <p class="font-body-md text-on-surface-variant line-clamp-3">
                    Bootstrapping a one-person studio in 2026 — pricing, positioning, and the math of
                    sustainable indie work. Why staying small is the ultimate competitive advantage.
                </p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-4">
                        <spanJ
                            class="bg-surface-container-high px-3 py-1 rounded-full font-label-md text-[11px] text-on-surface-variant">
                            #indie</spanJ>
                        <span class="font-label-md text-[12px] text-on-surface-variant">11 min read</span>
                    </div>
                    <div class="flex items-center gap-4 text-on-surface-variant">
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">bookmark</span>
                        <span
                            class="material-symbols-outlined text-xl hover:text-on-surface transition-colors">more_horiz</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block w-full h-32 rounded-lg overflow-hidden bg-surface-container-low">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    data-alt="A minimalist architectural photograph of a single small, modern studio structure isolated in a vast, serene landscape. High-key lighting, clean lines, and a peaceful mood. The image visually represents the concept of 'small software' and independent sustainable work in a high-quality editorial style."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDbpTHoJQDNuzCTu_2Ebn_-1fkyRxfgBJ5Dp1VlJHnr-KT2sl_rGbRAdP8NdFC-3XPX0GkpG-Lj882NVjDSVTpNkXbGsyR5BnmLxBJ_tQnVIfOnCnQJTGm4yzmEW9Adn_nuiAt5XXH1giYz-sQEkq0qA3LSzsVsRuFaPu0rsCQr6P2wRJNPUa9HhkLiy7i1gXxEnSA8fgzYl2eXJz3X44qgOyoPSBVw19Gu8EAfuZdxI9kM-rYHCFQDiPBtO2ehi2JwBjsQoVzEJY">
            </div>
        </article>
    </div>


