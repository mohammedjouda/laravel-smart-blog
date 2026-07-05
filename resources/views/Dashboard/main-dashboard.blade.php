<x-layout.main-layout>
    <main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-12">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="max-w-2xl">
                <h1 class="font-display text-display-lg text-on-surface mb-4">Content Management</h1>
                <p class="text-on-surface-variant text-lg font-body">Refine your editorial workflow, analyze engagement
                    metrics, and orchestrate your upcoming publications with precision.</p>
            </div>
            <button
                class="bg-primary-container text-on-primary px-8 py-3 rounded-full font-ui text-ui-button flex items-center gap-2 hover:bg-primary active:scale-95 transition-all shadow-sm">
                <span class="material-symbols-outlined text-[18px]">edit</span>
                Create New Post
            </button>
        </div>
        <!-- Dashboard Layout Grid -->
        <div class="grid grid-cols-12 gap-10">
            <!-- Sidebar / Stats (Refined Paperink Style) -->
            <aside class="col-span-12 lg:col-span-3 space-y-8">
                <div class="bg-surface p-6 rounded-lg border border-outline-variant/30">
                    <span class="text-[11px] font-ui font-bold uppercase tracking-[0.1em] text-outline block mb-4">Total
                        Reach</span>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-headline font-bold">124.8k</span>
                        <span class="text-primary text-xs font-bold font-ui">+12.4%</span>
                    </div>
                    <div class="mt-6 h-[2px] bg-surface-container rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-3/4"></div>
                    </div>
                </div>
                <div class="bg-surface p-6 rounded-lg border border-outline-variant/30">
                    <span
                        class="text-[11px] font-ui font-bold uppercase tracking-[0.1em] text-outline block mb-4">Active
                        Readers</span>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-headline font-bold">3,402</span>
                        <span
                            class="text-primary text-[10px] font-bold uppercase font-ui tracking-wider flex items-center gap-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-primary animate-pulse"></span> Live
                        </span>
                    </div>
                    <div class="mt-6 flex -space-x-3">
                        <img alt="Reader" class="h-9 w-9 rounded-full border-2 border-surface object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0VML3zUOfHvHKKGgB2fxPpyQcSC9dDq9j0F3O-7KH_-bJKLZNCU3pwl4DqzYrk4a9mDsbUjTTeGQn1-l7FjNNMq1fsTUXkKscVzA1EsyIyOQp4-zEo_R0qq4xuYna2CersNSNoMxRIG0w7MRpebhs_KgIWf9q32VIZN7GLS1K0m1tFxvwatR_gvRlf1TMFdZcSAZWPL2xMDJxu8K84-ayBmsIDrZ6b8fEqSHFoCKU4oAv8lcw89UGku8au7BjnTypsdLs5Y3VCeg-" />
                        <img alt="Reader" class="h-9 w-9 rounded-full border-2 border-surface object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBc3-HbWxqddsKbBQvRl9SvJVRGmlwiqFh1d-rJkyNdjwPkwMIDOjvHteSALjCg2r0gzl_5Z2Ly69CcdlgoOBkeOcRjQC7HCYkYc5WliviBJPQ8gMquCvlPGhm5UN8YPEinqbPSAiemK7PoUOscV22Lkq_dqVVUOwVCWxKSgLqY9xHOXWU2McIZ7HDKGMMBa7W4vxUqx1ghu5VHGHBH3KQdx9hyR8TAtGr30ZqCrwoioyW3M_gsVMu6Rf0gCPJHZVdwvRk-ydzKesNu" />
                        <div
                            class="h-9 w-9 rounded-full border-2 border-surface bg-surface-container-high flex items-center justify-center text-[10px] font-bold text-on-surface-variant font-ui">
                            +42</div>
                    </div>
                </div>
                <div class="bg-on-surface text-background p-8 rounded-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="font-headline text-2xl mb-3">Pro Tip</h3>
                        <p class="text-sm font-body opacity-80 leading-relaxed italic">"Articles published on Tuesdays
                            at 9:00 AM receive significantly higher engagement in the Paperink ecosystem."</p>
                    </div>
                    <span
                        class="material-symbols-outlined absolute -bottom-4 -right-4 text-background/10 text-[100px] rotate-12">lightbulb</span>
                </div>
            </aside>
            <!-- Main Content Area -->
            <div class="col-span-12 lg:col-span-9 space-y-8">
                <!-- Tabs & Filters -->
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between border-b border-outline-variant/30 gap-6">
                    <div class="flex gap-10 overflow-x-auto no-scrollbar">
                        <button
                            class="pb-4 text-sm font-ui font-bold border-b-2 border-primary text-primary whitespace-nowrap">Published
                            (42)</button>
                        <button
                            class="pb-4 text-sm font-ui font-semibold text-on-surface-variant hover:text-primary transition-colors whitespace-nowrap">Drafts
                            (12)</button>
                        <button
                            class="pb-4 text-sm font-ui font-semibold text-on-surface-variant hover:text-primary transition-colors whitespace-nowrap">Scheduled
                            (3)</button>
                        <button
                            class="pb-4 text-sm font-ui font-semibold text-on-surface-variant hover:text-primary transition-colors whitespace-nowrap">Archived</button>
                    </div>
                    <div class="flex items-center gap-3 pb-3">
                        <button
                            class="p-2.5 text-on-surface-variant hover:bg-surface-container rounded-full transition-all border border-transparent hover:border-outline-variant/30">
                            <span class="material-symbols-outlined text-[20px]">filter_list</span>
                        </button>
                        <button
                            class="p-2.5 text-on-surface-variant hover:bg-surface-container rounded-full transition-all border border-transparent hover:border-outline-variant/30">
                            <span class="material-symbols-outlined text-[20px]">sort</span>
                        </button>
                    </div>
                </div>
                <!-- Bulk Actions Bar -->
                <div
                    class="bg-surface-container-low px-6 py-4 rounded-full flex items-center justify-between border border-outline-variant/20">
                    <div class="flex items-center gap-4">
                        <input
                            class="w-4 h-4 rounded-sm border-outline text-primary-container focus:ring-primary-container bg-background"
                            type="checkbox" />
                        <span class="text-xs font-ui font-bold text-on-surface-variant uppercase tracking-widest">2
                            items selected</span>
                    </div>
                    <div class="flex items-center gap-6">
                        <button
                            class="text-xs font-ui font-bold text-on-surface-variant hover:text-primary transition-all uppercase tracking-widest">Unpublish</button>
                        <span class="w-[1px] h-4 bg-outline-variant/50"></span>
                        <button
                            class="text-xs font-ui font-bold text-primary hover:text-on-surface transition-all uppercase tracking-widest">Delete</button>
                    </div>
                </div>
                <!-- Post List -->
                <div class="space-y-4">
                    <!-- Article Row 1 -->
                    <div
                        class="bg-surface p-6 rounded-lg border border-outline-variant/30 hover:border-primary/40 hover:bg-surface-container-low/30 transition-all group">
                        <div class="flex items-start gap-6">
                            <input
                                class="mt-1.5 w-4 h-4 rounded-sm border-outline text-primary-container focus:ring-primary-container bg-background"
                                type="checkbox" />
                            <div class="flex-grow grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                                <div class="md:col-span-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span
                                            class="text-[10px] font-ui font-bold text-primary uppercase tracking-[0.15em]">Editorial</span>
                                        <span class="h-1 w-1 rounded-full bg-outline-variant"></span>
                                        <span
                                            class="text-[10px] font-ui font-bold text-outline uppercase tracking-[0.15em]">8
                                            min read</span>
                                    </div>
                                    <h3
                                        class="font-headline text-xl leading-tight group-hover:text-primary transition-colors cursor-pointer">
                                        The Architecture of Silence: Designing for Deep Focus</h3>
                                    <p
                                        class="text-[11px] font-ui text-on-surface-variant mt-2 uppercase tracking-wider font-semibold opacity-60">
                                        Published · Oct 14, 2024</p>
                                </div>
                                <div class="md:col-span-3 flex flex-col">
                                    <span
                                        class="text-[10px] font-ui font-bold text-outline uppercase tracking-[0.15em] mb-2">Engagement</span>
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="flex items-center gap-1.5 text-xs font-ui font-bold text-on-surface">
                                            <span class="material-symbols-outlined text-sm opacity-60">visibility</span>
                                            12.4k
                                        </div>
                                        <div
                                            class="flex items-center gap-1.5 text-xs font-ui font-bold text-on-surface">
                                            <span
                                                class="material-symbols-outlined text-sm opacity-60">chat_bubble</span>
                                            84
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="md:col-span-3 flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Analytics">
                                        <span class="material-symbols-outlined text-[20px]">bar_chart</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Settings">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Article Row 2 -->
                    <div
                        class="bg-surface p-6 rounded-lg border border-outline-variant/30 hover:border-primary/40 hover:bg-surface-container-low/30 transition-all group">
                        <div class="flex items-start gap-6">
                            <input checked=""
                                class="mt-1.5 w-4 h-4 rounded-sm border-outline text-primary-container focus:ring-primary-container bg-background"
                                type="checkbox" />
                            <div class="flex-grow grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                                <div class="md:col-span-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span
                                            class="text-[10px] font-ui font-bold text-primary uppercase tracking-[0.15em]">Critique</span>
                                        <span class="h-1 w-1 rounded-full bg-outline-variant"></span>
                                        <span
                                            class="text-[10px] font-ui font-bold text-outline uppercase tracking-[0.15em]">15
                                            min read</span>
                                    </div>
                                    <h3
                                        class="font-headline text-xl leading-tight group-hover:text-primary transition-colors cursor-pointer">
                                        Digital Skeuomorphism in a Flat World: A Retrospective</h3>
                                    <p
                                        class="text-[11px] font-ui text-on-surface-variant mt-2 uppercase tracking-wider font-semibold opacity-60">
                                        Published · Oct 09, 2024</p>
                                </div>
                                <div class="md:col-span-3 flex flex-col">
                                    <span
                                        class="text-[10px] font-ui font-bold text-outline uppercase tracking-[0.15em] mb-2">Engagement</span>
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="flex items-center gap-1.5 text-xs font-ui font-bold text-on-surface">
                                            <span
                                                class="material-symbols-outlined text-sm opacity-60">visibility</span>
                                            8.1k
                                        </div>
                                        <div
                                            class="flex items-center gap-1.5 text-xs font-ui font-bold text-on-surface">
                                            <span
                                                class="material-symbols-outlined text-sm opacity-60">chat_bubble</span>
                                            32
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="md:col-span-3 flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Analytics">
                                        <span class="material-symbols-outlined text-[20px]">bar_chart</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Settings">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Article Row 3 -->
                    <div
                        class="bg-surface p-6 rounded-lg border border-outline-variant/30 hover:border-primary/40 hover:bg-surface-container-low/30 transition-all group">
                        <div class="flex items-start gap-6">
                            <input checked=""
                                class="mt-1.5 w-4 h-4 rounded-sm border-outline text-primary-container focus:ring-primary-container bg-background"
                                type="checkbox" />
                            <div class="flex-grow grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                                <div class="md:col-span-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span
                                            class="text-[10px] font-ui font-bold text-primary uppercase tracking-[0.15em]">Technical</span>
                                        <span class="h-1 w-1 rounded-full bg-outline-variant"></span>
                                        <span
                                            class="text-[10px] font-ui font-bold text-outline uppercase tracking-[0.15em]">22
                                            min read</span>
                                    </div>
                                    <h3
                                        class="font-headline text-xl leading-tight group-hover:text-primary transition-colors cursor-pointer">
                                        Leveraging Rust for Distributed Ledger Systems</h3>
                                    <p
                                        class="text-[11px] font-ui text-on-surface-variant mt-2 uppercase tracking-wider font-semibold opacity-60">
                                        Published · Sep 28, 2024</p>
                                </div>
                                <div class="md:col-span-3 flex flex-col">
                                    <span
                                        class="text-[10px] font-ui font-bold text-outline uppercase tracking-[0.15em] mb-2">Engagement</span>
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="flex items-center gap-1.5 text-xs font-ui font-bold text-on-surface">
                                            <span
                                                class="material-symbols-outlined text-sm opacity-60">visibility</span>
                                            25.0k
                                        </div>
                                        <div
                                            class="flex items-center gap-1.5 text-xs font-ui font-bold text-on-surface">
                                            <span
                                                class="material-symbols-outlined text-sm opacity-60">chat_bubble</span>
                                            210
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="md:col-span-3 flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Analytics">
                                        <span class="material-symbols-outlined text-[20px]">bar_chart</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                        title="Settings">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between pt-12 border-t border-outline-variant/20 gap-6">
                    <span class="text-xs font-ui font-bold text-outline uppercase tracking-widest">Showing 1 to 10 of
                        42 articles</span>
                    <div class="flex gap-2">
                        <button
                            class="h-10 w-10 flex items-center justify-center border border-outline-variant/30 rounded-full hover:bg-surface-container transition-colors disabled:opacity-20"
                            disabled="">
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </button>
                        <button
                            class="h-10 w-10 flex items-center justify-center bg-on-surface text-background rounded-full font-ui font-bold text-sm">1</button>
                        <button
                            class="h-10 w-10 flex items-center justify-center border border-outline-variant/30 hover:bg-surface-container rounded-full font-ui font-bold text-sm text-on-surface-variant">2</button>
                        <button
                            class="h-10 w-10 flex items-center justify-center border border-outline-variant/30 hover:bg-surface-container rounded-full font-ui font-bold text-sm text-on-surface-variant">3</button>
                        <button
                            class="h-10 w-10 flex items-center justify-center border border-outline-variant/30 rounded-full hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout.main-layout>
