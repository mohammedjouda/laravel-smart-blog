@props([
'flag' => 'Featured',
'title' => 'The Architecture of Quiet: Why Minimalist Design Wins the Long Game',
'excerpt' =>
'In an era of digital noise, the most powerful statement a brand can make is silence. We explore the structural psychology behind Paper &amp; Ink aesthetics and how whitespace drives user focus in SaaS environments.',
'published_at' => 'May 12, 2024',
'read_at' => '8 min read',
'content' => 'In an era of digital
noise, the most powerful statement a brand can make is silence. We explore the structural
psychology behind Paper &amp; Ink aesthetics and how whitespace drives user focus in SaaS
environments.',
'author' => 'Julian Thorne',
'category' => 'Design Principal',
'time'=> 'some time ago'
])

<div class="lg:col-span-8 flex flex-col gap-stack-lg">
    <div class="w-full aspect-video rounded-lg overflow-hidden group cursor-pointer">
        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
            data-alt="A cinematic, high-resolution photograph of a minimalist home office desk at dusk. A sleek laptop sits on a dark wooden surface, its screen displaying a mesmerizing deep blue abstract nebular pattern.Beside it, a pencil holder with wooden pencils and a classic desk lamp casting a warm, atmospheric glow on the setup. The background is softly blurred, creating a moody, professional, and editorial atmosphere in line with a premium literary magazine."
            src="{{ $featuredPost->cover_image ? (\Illuminate\Support\Str::startsWith($featuredPost->cover_image, ['http://', 'https://']) ? $featuredPost->cover_image : Storage::url($featuredPost->cover_image)) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAp3MTRME82olBmAI-cldQ9xtOe7loPxN1DVmwaQJTZDywtZyQM3YbRNOdlLhsX6s7HFSowanI3irF2ABs-qoI1TjH13yNaHxliX1vNLlqIDMNW5hbPZBM8cxfAwQrlbxNiHv1Ud7KoInvxJhXWMzMYG_Rs0Bg6C6H7JqTun0DZ7E3hs788_IczIi_E5C2A1CeAyt9F1ZpCvkvMFtvxqrY5xMk0UEqW1fl_v3s6UyD-d0P0sIba0vZRauSakJuNAeKt1PqHuGqwqok' }}">
    </div>
    <div class="flex flex-col gap-4">
        <div class="flex items-center gap-2 text-primary uppercase tracking-widest text-[11px] font-bold">
            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
            Editor's Pick
        </div>
        <h1
            class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface leading-tight hover:text-primary transition-colors cursor-pointer">
            {{ $featuredPost->title ?? $title }}
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            {{ $featuredPost->excerpt ?? $excerpt }}
        </p>
        <div class="flex flex-wrap gap-2 mt-4">
            @if ($featuredPost && $featuredPost->tags->isNotEmpty())
            @foreach ($featuredPost->tags as $tag)
            <span
                class="bg-surface-container-high px-3 py-1 rounded-full font-label-md text-[11px] text-on-surface-variant">#{{ $tag->name }}</span>
            @endforeach
            @endif
        </div>

        <div class="flex items-center gap-3 mt-4">
            <img class="w-10 h-10 rounded-full object-cover border border-outline-variant/30"
                data-alt="User profile picture"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEE1fbjeNsb3yjzrY40U2CmXsHfOdhHCPtYJRz-lAXRIyAnZdvmdmP_xmAc0c_uC-mbgmG_psdbrmx0rqXNkPLm3K-Frfjl5OSeIT0lkMq3Ng9kxgc9Xqy52yxp38mq0sP5EZVQf72yHkdCPOixUIIemtS4nnAsBMgbvXyzcc7i07tN-pzof4EoleABdpeco3mVzlv6SkpjdPYMva-lcAQVokw8j34Lqg2xnqkCjoGr_aNXyDMfbrL8omds3iBN53QihvPly-hTyk">

        </div>
    </div>
</div>