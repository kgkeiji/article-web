@extends('portal._layouts.main')

@section('content')
    <main class="container-fluid py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-semibold mb-1">Contact Page Content Management</h3>
                <p class="text-muted mb-0">Manage the sections displayed on your Contact page.</p>
            </div>

            <span class="badge bg-primary-subtle text-primary px-3 py-2">
                <i class="bi bi-envelope me-1"></i> Contact Page Settings
            </span>
        </div>

        @php
            $sections = [
                'heading' => [
                    'label' => 'Page Heading',
                    'description' => 'The main heading and introduction at the top of the Contact page.',
                    'title' => 'Get in Touch',
                    'content' => "<p>Have a question, suggestion, or something worth sharing?<br>We'd love to hear from you.</p>",
                    'icon' => 'bi-chat-quote',
                ],
                'conversation' => [
                    'label' => 'Conversation',
                    'description' => 'The opening message in the Contact page information panel.',
                    'title' => "Let's start a conversation.",
                    'content' => "Whether you have feedback about our articles, need assistance,\nor simply want to connect, feel free to send us a message.\nWe're always happy to hear from our readers.",
                    'icon' => 'bi-chat-dots',
                ],
                'help' => [
                    'label' => 'Help Topics',
                    'description' => 'The heading and list of topics in the Contact page information panel.',
                    'title' => 'What can we help you with?',
                    'content' => '<ul><li>Article inquiries and suggestions</li><li>Feedback and recommendations</li><li>Technical support and assistance</li><li>General questions and collaborations</li></ul>',
                    'icon' => 'bi-list-check',
                ],
                'closing' => [
                    'label' => 'Closing Message',
                    'description' => 'The highlighted message at the bottom of the information panel.',
                    'title' => '',
                    'content' => 'Your thoughts matter. Every message helps us make TheArticle a better place for readers and creators.',
                    'icon' => 'bi-heart',
                ],
            ];
        @endphp

        <form action="{{ route('portal.cms.contact.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="w-100 col-12 col-xl-10 col-xxl-9">
                    @foreach ($sections as $section => $details)
                        @php
                            $contactSection = $contactSections->get($section);
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
                                        value="{{ old('title.' . $section, $contactSection->title ?? $details['title']) }}">
                                    @error('title.' . $section)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="answer-{{ $section }}" class="form-label fw-semibold">Section Content</label>
                                    <textarea class="form-control editor @error('answer.' . $section) is-invalid @enderror"
                                        name="answer[{{ $section }}]" id="answer-{{ $section }}" rows="6">{{ old('answer.' . $section, $contactSection->content ?? $details['content']) }}</textarea>
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
                                <span class="fw-semibold d-block">Save Contact Page Changes</span>
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
