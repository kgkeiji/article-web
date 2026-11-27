@extends('portal._layouts.main')

@section('content')

    <main class="container py-4 py-md-5" style="max-width: 1040px;">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">
                    Website Management
                </p>
                <h1 class="h3 fw-bold text-dark mb-1">Manage Home Page Content</h1>
                <p class="text-secondary mb-0">Manage the titles and content displayed on your homepage.</p>
            </div>
        </div>

        <form action="{{ route('portal.cms.store') }}" method="POST">
            @csrf

            @foreach ($sections as $section => $details)
                @php
                    $homeSection = $homeSections->get($section);
                @endphp

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center"
                                style="width: 46px; height: 46px; flex-shrink: 0;">
                                <i class="bi {{ $details['icon'] }} fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-1">{{ $details['label'] }}</h5>
                                <p class="text-muted small mb-0">{{ $details['description'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label for="title-{{ $section }}" class="form-label fw-semibold">
                                Section Title
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                class="form-control form-control-lg @error('title.' . $section) is-invalid @enderror"
                                name="title[{{ $section }}]" id="title-{{ $section }}"
                                placeholder="Enter {{ strtolower($details['label']) }} title"
                                value="{{ old('title.' . $section, $homeSection->title ?? $details['title']) }}">
                            @error('title.' . $section)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="answer-{{ $section }}" class="form-label fw-semibold">
                                Section Content
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control editor @error('answer.' . $section) is-invalid @enderror"
                                name="answer[{{ $section }}]" id="answer-{{ $section }}" rows="6"
                                placeholder="Write your {{ strtolower($details['label']) }} content here...">{{ old('answer.' . $section, $homeSection->content ?? $details['content']) }}</textarea>
                            @error('answer.' . $section)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2">
                    <i class="bi bi-check-circle me-2"></i> Save Changes
                </button>
            </div>
        </form>
    </main>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>

    <script>
        document.querySelectorAll('.editor').forEach(editor => {
            ClassicEditor.create(editor, {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', 'link', '|',
                    'fontColor', 'fontBackgroundColor', '|',
                    'undo', 'redo'
                ],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        }
                    ]
                }
            }).catch(error => console.error(error));
        });
    </script>
@stop
