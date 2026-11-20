@extends('backoffice._layouts.main')

@section('content')
    <div class="d-flex">
        <main class="flex-grow-1 p-3 p-md-4 p-lg-5" style="min-width:0">

            {{-- PAGE HEADER --}}
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <div>
                    <h1 class="h3 fw-medium mb-1">Dashboard</h1>
                    <div class="small text-primary fw-medium">
                        Wednesday · November 18, 2026
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded px-3 py-2 small">
                    <i class="bi bi-calendar3 text-primary me-2"></i>
                    November 12, 2026 - November 18, 2026
                </div>
            </div>

            {{-- WELCOME CARD --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3 p-md-4">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-8">
                            <h2 class="h5 text-primary fw-medium mb-2">
                                Welcome back, ready to share a new story?
                            </h2>

                            <p class="text-body-secondary mb-3">
                                Keep your content organized and your readers engaged.
                                Create new articles, manage existing publications,
                                and track your content performance in one place.
                            </p>

                            <a href="#" class="btn btn-primary btn-sm px-3">
                                <i class="bi bi-plus-lg me-1"></i>
                                Create New Article
                            </a>
                        </div>

                        <div class="col-lg-4 d-none d-lg-flex justify-content-end">
                            <div class="bg-body-tertiary rounded d-flex align-items-center justify-content-center text-primary"
                                style="width: 150px; height: 120px;">
                                <i class="bi bi-journal-richtext display-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STATISTICS --}}
            <div class="row g-3 mb-4">

                {{-- TOTAL ARTICLES --}}
                <div class="col-6 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="small text-body-secondary fw-medium">
                                    Total Articles
                                </span>
                                <i class="bi bi-journal-text text-primary fs-5"></i>
                            </div>

                            <div class="fs-4 fw-semibold">48</div>
                            <div class="small text-success mt-1">
                                <i class="bi bi-graph-up-arrow me-1"></i>
                                6 new this month
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PUBLISHED --}}
                <div class="col-6 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="small text-body-secondary fw-medium">
                                    Published
                                </span>
                                <i class="bi bi-file-earmark-check text-success fs-5"></i>
                            </div>

                            <div class="fs-4 fw-semibold">32</div>
                            <div class="small text-success mt-1">
                                <i class="bi bi-check-circle me-1"></i>
                                Live articles
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DRAFTS --}}
                <div class="col-6 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="small text-body-secondary fw-medium">
                                    Drafts
                                </span>
                                <i class="bi bi-file-earmark-text text-warning fs-5"></i>
                            </div>

                            <div class="fs-4 fw-semibold">8</div>
                            <div class="small text-body-secondary mt-1">
                                Awaiting publication
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOTAL VIEWS --}}
                <div class="col-6 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="small text-body-secondary fw-medium">
                                    Total Views
                                </span>
                                <i class="bi bi-eye text-info fs-5"></i>
                            </div>

                            <div class="fs-4 fw-semibold">12,840</div>
                            <div class="small text-success mt-1">
                                <i class="bi bi-graph-up-arrow me-1"></i>
                                18% this week
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- CONTENT ANALYTICS --}}
            <div class="row g-3">

                {{-- CONTENT OVERVIEW --}}
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-header bg-body-tertiary text-primary fw-medium py-3 px-3">
                            <i class="bi bi-collection me-2"></i>
                            Content Overview
                        </div>

                        <div class="card-body p-3">

                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-primary bg-opacity-10 text-primary rounded d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-journal-richtext fs-4"></i>
                                </div>

                                <div>
                                    <div class="fw-medium">Your Content at a Glance</div>
                                    <small class="text-body-secondary">
                                        Overview of your publications
                                    </small>
                                </div>
                            </div>

                            {{-- PUBLISHED PROGRESS --}}
                            <div class="d-flex justify-content-between mb-2">
                                <span class="small text-body-secondary">Published Articles</span>
                                <span class="small fw-medium">32 / 48</span>
                            </div>

                            <div class="progress mb-3" style="height: 7px;">
                                <div class="progress-bar bg-primary" style="width: 66.67%"></div>
                            </div>

                            {{-- DRAFT PROGRESS --}}
                            <div class="d-flex justify-content-between mb-2">
                                <span class="small text-body-secondary">Draft Articles</span>
                                <span class="small fw-medium">8 / 48</span>
                            </div>

                            <div class="progress mb-3" style="height: 7px;">
                                <div class="progress-bar bg-warning" style="width: 16.67%"></div>
                            </div>

                            {{-- ARCHIVED PROGRESS --}}
                            <div class="d-flex justify-content-between mb-2">
                                <span class="small text-body-secondary">Archived Articles</span>
                                <span class="small fw-medium">8 / 48</span>
                            </div>

                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-secondary" style="width: 16.67%"></div>
                            </div>

                            <a href="#" class="btn btn-primary btn-sm w-100">
                                Manage Articles
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>
                    </div>
                </div>

                {{-- ARTICLE PERFORMANCE --}}
                <div class="col-lg-8">
                    <div class="card h-100 border-0 shadow-sm">

                        <div
                            class="card-header bg-body-tertiary text-primary fw-medium py-3 px-3 d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-bar-chart-line me-2"></i>
                                Article Performance
                            </span>

                            <span class="small text-body-secondary fw-normal">
                                Last 7 Days
                            </span>
                        </div>

                        <div class="card-body p-3">

                            <div class="mb-3">
                                <div class="fs-4 fw-semibold">12,840</div>
                                <div class="small text-body-secondary">
                                    Total article views
                                    <span class="text-success ms-1">
                                        <i class="bi bi-arrow-up"></i> 18%
                                    </span>
                                </div>
                            </div>

                            {{-- ARTICLE VIEWS CHART --}}
                            <div class="w-100">
                                <svg viewBox="0 0 640 260" class="w-100" role="img"
                                    aria-label="Article views over the last seven days">

                                    {{-- GRID LINES --}}
                                    <g stroke="currentColor" stroke-opacity=".15">
                                        <line x1="70" y1="20" x2="630" y2="20" />
                                        <line x1="70" y1="70" x2="630" y2="70" />
                                        <line x1="70" y1="120" x2="630" y2="120" />
                                        <line x1="70" y1="170" x2="630" y2="170" />
                                        <line x1="70" y1="220" x2="630" y2="220" />
                                    </g>

                                    {{-- Y AXIS --}}
                                    <g fill="currentColor" class="text-body-secondary" font-size="12" text-anchor="end">
                                        <text x="60" y="24">4,000</text>
                                        <text x="60" y="74">3,000</text>
                                        <text x="60" y="124">2,000</text>
                                        <text x="60" y="174">1,000</text>
                                        <text x="60" y="224">0</text>
                                    </g>

                                    {{-- X AXIS --}}
                                    <g fill="currentColor" class="text-body-secondary" font-size="12"
                                        text-anchor="middle">
                                        <text x="80" y="245">Thu</text>
                                        <text x="170" y="245">Fri</text>
                                        <text x="260" y="245">Sat</text>
                                        <text x="350" y="245">Sun</text>
                                        <text x="440" y="245">Mon</text>
                                        <text x="530" y="245">Tue</text>
                                        <text x="610" y="245">Wed</text>
                                    </g>

                                    {{-- CHART --}}
                                    <g class="text-primary">
                                        <path
                                            d="M80,175 C110,165 140,155 170,160 S230,130 260,140 S320,115 350,120 S410,95 440,105 S500,65 530,80 S580,45 610,35 L610,220 L80,220Z"
                                            fill="currentColor" fill-opacity=".08" />

                                        <path
                                            d="M80,175 C110,165 140,155 170,160 S230,130 260,140 S320,115 350,120 S410,95 440,105 S500,65 530,80 S580,45 610,35"
                                            fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" />

                                        <g fill="currentColor">
                                            <circle cx="80" cy="175" r="4" />
                                            <circle cx="170" cy="160" r="4" />
                                            <circle cx="260" cy="140" r="4" />
                                            <circle cx="350" cy="120" r="4" />
                                            <circle cx="440" cy="105" r="4" />
                                            <circle cx="530" cy="80" r="4" />
                                            <circle cx="610" cy="35" r="4" />
                                        </g>
                                    </g>
                                </svg>
                            </div>

                            <div class="small text-body-secondary text-center mt-2">
                                Sample data showing daily article views.
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
@endsection

@section('page-styles')
    <style>
        .card {
            transition: box-shadow .2s ease;
        }

        .card:hover {
            box-shadow: 0 .25rem 1rem rgba(0, 0, 0, .08) !important;
        }
    </style>
@endsection
