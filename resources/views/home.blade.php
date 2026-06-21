<x-layout.main-layout title="Home">
    <main class="max-w-container-max mx-auto px-margin-desktop py-12">
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-section-gap mb-section-gap">
            <x-content.featured-articals />
            <!-- Trending Sidebar -->
            <aside
                class="lg:col-span-4 flex flex-col gap-stack-lg border-l border-outline-variant/20 pl-8 hidden lg:flex">
                <x-aside.trending-articles />

            </aside>
        </section>
        <!-- Topic Chips -->
        <section
            class="flex flex-wrap items-center gap-stack-sm border-b border-outline-variant/20 pb-10 mb-10 overflow-x-auto no-scrollbar">
            <button
                class="px-5 py-2 rounded-full bg-on-surface text-white font-label-md text-label-md whitespace-nowrap">For
                you</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Design</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Engineering</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Writing</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">CSS</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Leadership</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Indie</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Startups</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Essay</button>
            <button
                class="px-5 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md border border-outline-variant/10 hover:border-outline-variant transition-all whitespace-nowrap">Frontend</button>
        </section>

        <!-- Main Feed Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-section-gap">
            <x-content.suggested-articles />
            <!-- Right Sidebar Column -->
            <aside class="lg:col-span-4 flex flex-col gap-12">
                <x-aside.tags />
                <x-aside.writer-follow />
                <x-aside.start-writing />
            </aside>
        </div>
    </main>
</x-layout.main-layout>
