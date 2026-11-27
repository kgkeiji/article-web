@extends('portal._layouts.main')

@section('content')
    <div class="container py-4 py-md-5" style="max-width: 1040px;">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">
                    Content Management
                </p>
                <h1 class="h3 fw-bold text-dark mb-1">Manage Your Articles</h1>
                <p class="text-secondary mb-0">Your articles are visible on the website only while you are logged in.</p>
            </div>
            <a href="{{ route('web.articles') }}" target="_blank" rel="noopener" class="btn btn-outline-info">
                Preview Website
            </a>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h2 class="h6 fw-bold mb-0">Create Article</h2>
            </div>
            <form action="{{ route('portal.cms.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="new-name" class="form-label fw-semibold">Title</label>
                        <input id="new-name" name="name" value="{{ old('name') }}" required maxlength="30"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new-description" class="form-label fw-semibold">Article content</label>
                        <textarea id="new-description" name="description" rows="5"
                            class="form-control article-editor @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div id="new-description-error" class="invalid-feedback">Article content is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="new-image" class="form-label fw-semibold">Image</label>
                        <input id="new-image" type="file" name="image" accept=".jpg,.jpeg,.png"
                            class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Publish Article</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 fw-bold mb-0">Your Articles</h2>
            <span class="text-secondary small">{{ $articles->count() }} total</span>
        </div>

        @forelse ($articles as $article)
            <div class="card shadow-sm border-0 mb-3">
                <form action="{{ route('portal.cms.articles.update', $article->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-md-row gap-4">
                            @if ($article->filename && $article->directory)
                                <img src="{{ rtrim($article->directory, '/') . '/thumbnails/' . $article->filename }}"
                                    alt="{{ $article->name }}" class="rounded object-fit-cover" width="160" height="120">
                            @endif
                            <div class="flex-grow-1">
                                <div class="mb-3">
                                    <label for="name-{{ $article->id }}" class="form-label fw-semibold">Title</label>
                                    <input id="name-{{ $article->id }}" name="name" value="{{ $article->name }}"
                                        required maxlength="30" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="description-{{ $article->id }}" class="form-label fw-semibold">Article content</label>
                                    <textarea id="description-{{ $article->id }}" name="description" rows="5"
                                        class="form-control article-editor">{{ $article->description }}</textarea>
                                    <div id="description-{{ $article->id }}-error" class="invalid-feedback">
                                        Article content is required.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="image-{{ $article->id }}" class="form-label fw-semibold">Replace image (optional)</label>
                                    <input id="image-{{ $article->id }}" type="file" name="image" accept=".jpg,.jpeg,.png"
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-footer bg-white text-end">
                    <form action="{{ route('portal.cms.articles.delete', $article->id) }}" method="POST"
                        onsubmit="return confirm('Delete this article?')">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete Article</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="card border-0 shadow-sm text-center py-5">
                <div class="card-body">
                    <p class="text-secondary mb-0">You have not created any articles yet.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>
    <script>
        const articleEditorToolbar = [
            'heading', '|',
            'bold', 'italic', 'underline', '|',
            'bulletedList', 'numberedList', 'link', '|',
            'fontColor', 'fontBackgroundColor', '|',
            'undo', 'redo'
        ];

        const articleEditorHeading = {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
            ]
        };

        function hasArticleContent(data) {
            return data
                .replace(/<[^>]*>/g, '')
                .replace(/&nbsp;|&#160;/gi, ' ')
                .trim().length > 0;
        }

        document.querySelectorAll('.article-editor').forEach(textarea => {
            const form = textarea.closest('form');
            const feedback = document.getElementById(`${textarea.id}-error`);
            let submitAttempted = false;

            ClassicEditor.create(textarea, {
                toolbar: articleEditorToolbar,
                heading: articleEditorHeading
            }).then(editor => {
                const syncArticleContent = () => {
                    textarea.value = editor.getData();

                    if (submitAttempted) {
                        feedback.classList.toggle('d-block', !hasArticleContent(textarea.value));
                    }
                };

                editor.model.document.on('change:data', syncArticleContent);
                form.addEventListener('submit', event => {
                    syncArticleContent();
                    submitAttempted = true;

                    if (!hasArticleContent(textarea.value)) {
                        event.preventDefault();
                        feedback.classList.add('d-block');
                        editor.editing.view.focus();
                    }
                });
            }).catch(error => console.error(error));
        });
    </script>
@endsection
