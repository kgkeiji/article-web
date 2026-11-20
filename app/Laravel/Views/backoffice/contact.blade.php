@extends('backoffice._layouts.main')

@section('content')
    <div class="d-flex">
        <main class="flex-grow-1 p-3 p-md-4 p-lg-5">

            <div class="mb-4">
                <h1 class="h3 fw-medium mb-2">Contact Page Management</h1>
                <p class="text-primary small mb-0">
                    Manage the content and contact information displayed on your Contact page.
                </p>
            </div>

        </main>
    </div>
@endsection

@section('page-styles')
    <style>
        body {
            background: #FAFAFA;
        }

        main {
            min-width: 0;
        }
    </style>
@endsection
