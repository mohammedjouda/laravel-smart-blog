@csrf

@if ($errors->any())
    <div class="rounded-lg border border-error/30 bg-error-container px-4 py-3 text-error">
        <p class="font-bold">Please fix the highlighted fields.</p>
        <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
    <div class="lg:col-span-8 space-y-stack-lg">
        <div class="space-y-3">
            <label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest" for="title">Headline</label>
            <input
                class="w-full bg-transparent border-0 border-b border-outline-variant/40 p-0 pb-4 focus:ring-0 focus:border-primary font-headline-lg text-display-lg-mobile md:text-display-lg text-on-surface placeholder:text-outline-variant/60"
                id="title"
                name="title"
                value="{{ old('title', $post->title) }}"
                placeholder="Enter your headline..."
                required
                type="text">
            @error('title')
                <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Quill.js Editor Styles -->
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <style>
            .ql-toolbar.ql-snow {
                border: none !important;
                background: transparent;
                padding: 0 !important;
            }
            .ql-container.ql-snow {
                border: none !important;
                font-family: 'Hanken Grotesk', sans-serif !important;
                font-size: 1.125rem !important;
            }
            .ql-editor {
                padding: 16px 0 !important;
                min-height: 560px;
                font-size: 1.125rem !important;
                line-height: 1.6 !important;
                color: #59413e !important;
            }
            .ql-editor.ql-blank::before {
                left: 0 !important;
                font-style: normal !important;
                color: rgba(89, 65, 62, 0.4) !important;
            }
            /* Custom styling to match Paperink theme */
            #editor-toolbar button {
                transition: all 0.2s;
            }
            #editor-toolbar button:hover {
                background-color: rgba(139, 14, 15, 0.08);
                color: #8b0e0f;
            }
            #editor-toolbar button.ql-active {
                background-color: rgba(139, 14, 15, 0.15);
                color: #8b0e0f;
            }
        </style>

        <!-- Dynamic Toolbar for Quill -->
        <div id="editor-toolbar" class="flex items-center gap-1.5 p-1.5 bg-surface-container-low rounded-lg border border-outline-variant/20">
            <button class="ql-bold p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" title="Bold">
                <span class="material-symbols-outlined block text-[20px]">format_bold</span>
            </button>
            <button class="ql-italic p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" title="Italic">
                <span class="material-symbols-outlined block text-[20px]">format_italic</span>
            </button>
            <button class="ql-link p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" title="Insert Link">
                <span class="material-symbols-outlined block text-[20px]">link</span>
            </button>
            
            <div class="w-px h-6 bg-outline-variant/40 mx-1.5"></div>
            
            <button class="ql-blockquote p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" title="Quote">
                <span class="material-symbols-outlined block text-[20px]">format_quote</span>
            </button>
            <button class="ql-list p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" value="ordered" title="Numbered List">
                <span class="material-symbols-outlined block text-[20px]">format_list_numbered</span>
            </button>
            <button class="ql-list p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" value="bullet" title="Bullet List">
                <span class="material-symbols-outlined block text-[20px]">format_list_bulleted</span>
            </button>

            <div class="w-px h-6 bg-outline-variant/40 mx-1.5"></div>

            <button class="ql-clean p-2 text-on-surface-variant hover:text-primary rounded transition-colors" type="button" title="Clear Formatting">
                <span class="material-symbols-outlined block text-[20px]">format_clear</span>
            </button>
        </div>

        <div class="space-y-3">
            <label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest" for="content">Story</label>
            
            <!-- Quill Editor Container -->
            <div id="editor-container" class="writing-area w-full min-h-[560px] bg-transparent border-none p-0 focus:ring-0 font-body-lg text-body-lg text-on-surface-variant leading-relaxed"></div>
            
            <!-- Hidden field to capture story contents -->
            <textarea
                class="hidden"
                id="content"
                name="content"
                required>{{ old('content', $post->content) }}</textarea>

            @error('content')
                <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Quill.js Editor Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const quill = new Quill('#editor-container', {
                    theme: 'snow',
                    placeholder: 'Begin your story here...',
                    modules: {
                        toolbar: '#editor-toolbar'
                    }
                });

                const contentInput = document.getElementById('content');
                
                // Load initial HTML from textarea into Quill
                if (contentInput.value) {
                    quill.root.innerHTML = contentInput.value;
                }

                // Keep content input synchronized on editor changes
                quill.on('text-change', function() {
                    const html = quill.root.innerHTML;
                    contentInput.value = html === '<p><br></p>' ? '' : html;
                });

                // Also ensure final sync before form submission
                const form = contentInput.closest('form');
                if (form) {
                    form.addEventListener('submit', function() {
                        const html = quill.root.innerHTML;
                        contentInput.value = html === '<p><br></p>' ? '' : html;
                    });
                }
            });
        </script>
    </div>

    <aside class="lg:col-span-4 space-y-stack-lg lg:sticky lg:top-24">
        <div class="bg-surface-container-low rounded-xl p-6 space-y-6 border border-outline-variant/20">
            <h3 class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant/70 border-b border-outline-variant/20 pb-2">
                Configuration
            </h3>

            <div class="space-y-stack-sm" id="cover-image-widget">
                <label class="font-label-md text-label-md text-on-surface" for="cover_image">Cover Image</label>
                
                <!-- Preview Container -->
                <div id="image-preview-container" class="{{ $post->cover_image ? '' : 'hidden' }} mb-3 relative rounded-lg overflow-hidden border border-outline-variant/30 aspect-video bg-surface-container flex items-center justify-center">
                    <img id="image-preview" 
                         src="{{ $post->cover_image ? (Str::startsWith($post->cover_image, ['http://', 'https://']) ? $post->cover_image : Storage::url($post->cover_image)) : '' }}" 
                         class="w-full h-full object-cover" 
                         alt="Cover Image Preview">
                    
                    <!-- Overlay Buttons (Replace / Delete) -->
                    <div class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
                        <button type="button" onclick="document.getElementById('cover_image').click()" class="bg-white/95 hover:bg-white text-on-surface font-semibold text-xs px-3 py-2 rounded shadow-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">cached</span> Replace
                        </button>
                        <button type="button" id="btn-delete-image" class="bg-error text-white hover:bg-error/90 font-semibold text-xs px-3 py-2 rounded shadow-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">delete</span> Delete
                        </button>
                    </div>
                </div>

                <!-- Input area (hidden when preview exists) -->
                <div id="file-input-wrapper" class="{{ $post->cover_image ? 'hidden' : '' }}">
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-2 font-body-md text-on-surface focus:ring-primary focus:border-primary file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"
                        id="cover_image"
                        name="cover_image"
                        type="file"
                        accept="image/*">
                </div>

                <!-- Hidden inputs to track deletion state -->
                <input type="hidden" name="delete_cover_image" id="delete_cover_image" value="0">

                @error('cover_image')
                    <p class="text-error">{{ $message }}</p>
                @enderror

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const coverInput = document.getElementById('cover_image');
                        const previewContainer = document.getElementById('image-preview-container');
                        const previewImg = document.getElementById('image-preview');
                        const inputWrapper = document.getElementById('file-input-wrapper');
                        const deleteInput = document.getElementById('delete_cover_image');
                        const btnDelete = document.getElementById('btn-delete-image');

                        coverInput.addEventListener('change', function() {
                            const file = this.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    previewImg.src = e.target.result;
                                    previewContainer.classList.remove('hidden');
                                    inputWrapper.classList.add('hidden');
                                    deleteInput.value = '0';
                                }
                                reader.readAsDataURL(file);
                            }
                        });

                        btnDelete.addEventListener('click', function(e) {
                            e.preventDefault();
                            coverInput.value = ''; // clear input
                            previewImg.src = '';
                            previewContainer.classList.add('hidden');
                            inputWrapper.classList.remove('hidden');
                            deleteInput.value = '1';
                        });
                    });
                </script>
            </div>

            <div class="space-y-stack-sm">
                <label class="font-label-md text-label-md text-on-surface" for="category_id">Category</label>
                <select
                    class="w-full bg-surface-container-lowest border-outline-variant rounded-lg font-body-md text-on-surface focus:ring-primary focus:border-primary"
                    id="category_id"
                    name="category_id">
                    <option value="">No category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) old('category_id', $post->category_id) === (string) $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-stack-sm">
                <label class="font-label-md text-label-md text-on-surface" for="tags">Tags</label>
                <input
                    class="w-full bg-surface-container-lowest border-outline-variant rounded-lg font-body-md text-on-surface focus:ring-primary focus:border-primary"
                    id="tags"
                    name="tags"
                    value="{{ old('tags', $post->tags->pluck('name')->implode(', ')) }}"
                    placeholder="tag1, tag2, tag3"
                    type="text">
                <p class="text-label-md text-on-surface-variant">Separate tags with commas.</p>
                @error('tags')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-stack-sm">
                <label class="font-label-md text-label-md text-on-surface" for="status">Publication Status</label>
                <select
                    class="w-full bg-surface-container-lowest border-outline-variant rounded-lg font-body-md text-on-surface focus:ring-primary focus:border-primary"
                    id="status"
                    name="status"
                    required>
                    @foreach (['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('status', $post->status ?: 'draft') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('status')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-stack-sm">
                <label class="font-label-md text-label-md text-on-surface" for="excerpt">Excerpt</label>
                <textarea
                    class="w-full bg-surface-container-lowest border-outline-variant rounded-lg font-body-md text-on-surface p-3 min-h-[120px] focus:ring-primary focus:border-primary"
                    id="excerpt"
                    name="excerpt"
                    placeholder="Write a brief summary for the feed...">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-stack-sm">
                <label class="font-label-md text-label-md text-on-surface" for="slug">URL Slug</label>
                <input
                    class="w-full bg-surface-container-lowest border-outline-variant rounded-lg font-body-md text-on-surface focus:ring-primary focus:border-primary"
                    id="slug"
                    name="slug"
                    value="{{ old('slug', $post->slug) }}"
                    placeholder="generated-from-title"
                    type="text">
                <p class="text-label-md text-on-surface-variant">Leave empty to generate from the headline.</p>
                @error('slug')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex gap-3">
            <a class="flex-1 text-center px-5 py-3 rounded-lg border border-outline-variant text-on-surface-variant font-label-md hover:bg-surface-container-low transition-all"
                href="{{ route('dashboard.posts.index') }}">Cancel</a>
            <button class="flex-1 px-5 py-3 rounded-lg bg-primary-container text-on-primary font-label-md hover:bg-primary transition-all"
                type="submit">{{ $submitLabel }}</button>
        </div>
    </aside>
</div>
