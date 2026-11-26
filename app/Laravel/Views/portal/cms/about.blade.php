@extends('portal._layouts.main')

@section('content')
    <main class="container-fluid py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-semibold mb-1">About Page Content Management</h3>
                <p class="text-muted mb-0">Manage the sections displayed on your About page.</p>
            </div>

            <span class="badge bg-primary-subtle text-primary px-3 py-2">
                <i class="bi bi-info-circle me-1"></i> About Page Settings
            </span>
        </div>

        @php
            $sections = [
                'heading' => [
                    'label' => 'Page Heading',
                    'description' => 'The main heading at the top of the About page.',
                    'title' => 'About Us',
                    'content' => '',
                    'icon' => 'bi-type',
                ],
                'tagline' => [
                    'label' => 'Tagline',
                    'description' => 'The introductory statement below the heading.',
                    'title' => '',
                    'content' => 'Manage, organize, and publish articles with ease.',
                    'icon' => 'bi-chat-quote',
                ],
                'team_intro' => [
                    'label' => 'Team Introduction',
                    'description' => 'The introduction to the team.',
                    'title' => '',
                    'content' => 'We are a team of passionate developers dedicated to creating amazing web applications with Laravel.',
                    'icon' => 'bi-people',
                ],
                'story' => [
                    'label' => 'About TheArticle',
                    'description' => 'The main description of the platform.',
                    'title' => '',
                    'content' => 'TheArticle is a platform dedicated to sharing knowledge, exploring ideas, and bringing meaningful stories to readers. We believe that every article has the power to inform, inspire, and spark conversations. Our goal is to make discovering and sharing valuable content a simple and enjoyable experience. Whether you are looking for fresh perspectives, informative reads, or interesting topics, TheArticle brings stories together in one place.',
                    'icon' => 'bi-book',
                ],
                'mission' => [
                    'label' => 'Our Mission',
                    'description' => 'The mission statement shown at the bottom of the page.',
                    'title' => 'Our Mission',
                    'content' => 'We aim to create a space where information is accessible, ideas are celebrated, and stories can reach the people who need them. Through thoughtful content and a seamless reading experience, we strive to make every visit worthwhile.',
                    'icon' => 'bi-bullseye',
                ],
            ];
        @endphp

        <form action="{{ route('portal.cms.about.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="w-100 col-12 col-xl-10 col-xxl-9">
                    @foreach ($sections as $section => $details)
                        @php
                            $aboutSection = $aboutSections->get($section);
                        @endphp

                        <div class="card border-0 shadow-sm rounded-3 mb-4">
                            <div class="card-header bg-white border-bottom px-4 py-3">
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
                                    <label for="title-{{ $section }}" class="form-label fw-semibold">Section Title</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('title.' . $section) is-invalid @enderror"
                                        name="title[{{ $section }}]" id="title-{{ $section }}"
                                        value="{{ old('title.' . $section, $aboutSection->title ?? $details['title']) }}">
                                    @error('title.' . $section)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="answer-{{ $section }}" class="form-label fw-semibold">Section Content</label>
                                    <textarea class="form-control editor @error('answer.' . $section) is-invalid @enderror"
                                        name="answer[{{ $section }}]" id="answer-{{ $section }}" rows="6">{{ old('answer.' . $section, $aboutSection->content ?? $details['content']) }}</textarea>
                                    @error('answer.' . $section)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted mt-2 d-block">You can format your content using the rich text editor.</small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="card border-0 shadow-sm rounded-3 mb-4">
                        <div class="card-body p-3 d-flex flex-wrap justify-content-between align-items-center gap-3">
                            <div>
                                <span class="fw-semibold d-block">Save About Page Changes</span>
                                <small class="text-muted">Make sure your content is correct before saving.</small>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="bi bi-check-circle me-2"></i> Save Changes
                            </button>
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
    </script>
@endsection
