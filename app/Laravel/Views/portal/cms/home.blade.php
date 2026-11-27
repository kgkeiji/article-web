@extends('portal._layouts.main')

@section('content')
    <main class="container-fluid py-4">

        {{-- Page Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-semibold mb-1">Homepage Content Management</h3>
                <p class="text-muted mb-0">
                    Manage the titles and content displayed on your homepage.
                </p>
            </div>

            <span class="badge bg-primary-subtle text-primary px-3 py-2">
                <i class="bi bi-house-door me-1"></i> Homepage Settings
            </span>
        </div>

        @php
            $sections = [
                'content_creation' => [
                    'label' => 'Content Creation',
                    'description' => 'Manage content that highlights your creative capabilities.',
                    'icon' => 'bi-pencil-square',
                ],
                'fresh_experience' => [
                    'label' => 'Fresh Experience',
                    'description' => 'Showcase the fresh and engaging experiences you offer.',
                    'icon' => 'bi-stars',
                ],
                'great_community' => [
                    'label' => 'Great Community',
                    'description' => 'Highlight your community and audience engagement.',
                    'icon' => 'bi-people',
                ],
                'modern_design' => [
                    'label' => 'Modern Design',
                    'description' => 'Present your modern design approach and features.',
                    'icon' => 'bi-palette',
                ],
            ];
        @endphp

        <main class="container-fluid py-4">

            {{-- Page Header --}}
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <div>
                    <h3 class="fw-semibold mb-1">Homepage Content Management</h3>
                    <p class="text-muted mb-0">
                        Manage the titles and content displayed on your homepage.
                    </p>
                </div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    <i class="bi bi-house-door me-1"></i> Homepage Settings
                </span>
            </div>

            @php
                $sections = [
                    'content_creation' => [
                        'label' => 'Content Creation',
                        'description' => 'Manage content that highlights your creative capabilities.',
                        'icon' => 'bi-pencil-square',
                    ],
                    'fresh_experience' => [
                        'label' => 'Fresh Experience',
                        'description' => 'Showcase the fresh and engaging experiences you offer.',
                        'icon' => 'bi-stars',
                    ],
                    'great_community' => [
                        'label' => 'Great Community',
                        'description' => 'Highlight your community and audience engagement.',
                        'icon' => 'bi-people',
                    ],
                    'modern_design' => [
                        'label' => 'Modern Design',
                        'description' => 'Present your modern design approach and features.',
                        'icon' => 'bi-palette',
                    ],
                ];
            @endphp

            <form action="" method="POST">
                @csrf

                <div class="row">
                    <div class="w-100 col-12 col-xl-10 col-xxl-9">

                        @foreach ($sections as $section => $details)
                            @php
                                $homeSection = $homeSections->get($section);
                            @endphp

                            <div class="card border-0 shadow-sm rounded-3 mb-4">

                                {{-- Card Header --}}
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <div class="d-flex align-items-center gap-3">

                                        <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center"
                                            style="width: 46px; height: 46px; flex-shrink: 0;">
                                            <i class="bi {{ $details['icon'] }} fs-4"></i>
                                        </div>

                                        <div>
                                            <h5 class="fw-semibold mb-1">
                                                {{ $details['label'] }}
                                            </h5>
                                            <p class="text-muted small mb-0">
                                                {{ $details['description'] }}
                                            </p>
                                        </div>

                                    </div>
                                </div>

                                {{-- Card Body --}}
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
                                            value="{{ old('title.' . $section, $homeSection->title ?? '') }}">

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
                                            placeholder="Write your {{ strtolower($details['label']) }} content here...">{{ old('answer.' . $section, $homeSection->content ?? '') }}</textarea>

                                        @error('answer.' . $section)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <small class="text-muted mt-2 d-block">
                                            You can format your content using the rich text editor.
                                        </small>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                        {{-- Save Actions --}}
                        <div class="card border-0 shadow-sm rounded-3 mb-4">
                            <div class="card-body p-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

                                    <div>
                                        <span class="fw-semibold d-block">Save Homepage Changes</span>
                                        <small class="text-muted">
                                            Make sure your content is correct before saving.
                                        </small>
                                    </div>

                                    <button type="submit" class="btn btn-primary px-4 py-2">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Changes
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
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
