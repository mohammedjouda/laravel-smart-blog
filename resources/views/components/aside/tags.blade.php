<!-- Recommended Topics -->
<div class="flex flex-col gap-stack-lg">
    <h4 class="font-label-md text-on-surface font-bold uppercase tracking-widest text-xs">Recommended
        Topics</h4>
    <div class="flex flex-wrap gap-2">
        @foreach ($tags as $tag)
            <a class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-[12px] hover:bg-surface-container transition-colors"
                href="#">#{{ $tag->name }}</a>
        @endforeach
    </div>
    <a class="text-primary font-label-md text-label-md hover:underline" href="#">See more
        topics</a>
</div>
