@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="container py-5">
            <h1 class="display-4 fw-bold mb-3 text-center">Articles</h1>
            <p class="lead text-primary mb-4 text-center">
                Explore stories, ideas, and perspectives worth sharing.
            </p>

            <div class="list-group gap-2">
                @forelse ($articles as $article)
                    <a href="{{ route('web.article', $article->id) }}"
                        class="list-group-item list-group-item-action d-flex w-100 shadow-sm">
                        <div class="article-list w-100 d-flex flex-column flex-md-row">
                            {{-- start of article image --}}
                            @if ($article->filename && $article->directory)
                                <img src="{{ rtrim($article->directory, '/') . '/thumbnails/' . $article->filename }}"
                                    alt="{{ $article->name }}" class="mx-auto me-md-3 img-fluid" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/images/diorama.png') }}" alt="Creative digital landscape"
                                    class="mx-auto me-md-3 img-fluid" style="object-fit: cover;">
                            @endif

                            <div class="w-100">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $article->name }}</h5>
                                    <small class="text-body-secondary">{{ $article->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">
                                    {{ Str::limit(strip_tags($article->description), 180) }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <a href="{{ route('web.article') }}"
                        class="list-group-item list-group-item-action d-flex w-100 shadow-sm">
                        <div class="article-list w-100 d-flex flex-column flex-md-row">
                            <img src="{{ asset('assets/images/diorama.png') }}" alt="Creative digital landscape"
                                class="mx-auto me-md-3 img-fluid" style="object-fit: cover;">

                            <div class="w-100">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">The Art of Building Creative Worlds</h5>
                                    <small class="text-body-secondary">1 day ago</small>
                                </div>
                                <p class="mb-1">Discover how creativity, imagination, and thoughtful design come together
                                    to create extraordinary digital worlds.</p>
                                <small class="text-body-secondary">Creativity · 5 min read</small>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('web.article') }}"
                        class="list-group-item list-group-item-action d-flex w-100 shadow-sm">
                        <div class="article-list w-100 d-flex flex-column flex-md-row">
                            <img src="{{ asset('assets/images/diorama.png') }}" alt="Digital world landscape"
                                class="mx-auto me-md-3 img-fluid" style="object-fit: cover;">

                            <div class="w-100">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Exploring the Endless Possibilities of Digital Creativity</h5>
                                    <small class="text-body-secondary">3 days ago</small>
                                </div>
                                <p class="mb-1">From simple concepts to detailed creations, explore how digital tools are
                                    changing the way people express their ideas.</p>
                                <small class="text-body-secondary">Technology · 7 min read</small>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('web.article') }}"
                        class="list-group-item list-group-item-action d-flex w-100 shadow-sm">
                        <div class="article-list w-100 d-flex flex-column flex-md-row">
                            <img src="{{ asset('assets/images/diorama.png') }}" alt="Creative virtual environment"
                                class="mx-auto me-md-3 img-fluid" style="object-fit: cover;">

                            <div class="w-100">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Why Sharing Ideas Makes a Difference</h5>
                                    <small class="text-body-secondary">5 days ago</small>
                                </div>
                                <p class="mb-1">Every great idea starts somewhere. Learn why sharing knowledge and
                                    experiences can inspire others and build stronger communities.</p>
                                <small class="text-body-secondary">Community · 4 min read</small>
                            </div>
                        </div>
                    </a>
                @endforelse
            </div>
        </div>
    </main>
@endsection

@section('page-styles')
    <style>
        body {
            background: #FAFAFA;
        }

        @media (min-width: 768px) {

            .article-list img {
                width: 100px !important;
                height: 100px !important;
            }
        }
    </style>
@endsection
