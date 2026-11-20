@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-grow-1 p-3 p-md-4 p-lg-5" style="min-width:0">

        <div class="mb-4">
            <h3 class="fw-medium mb-1">Profile</h3>
            <p class="text-primary fw-medium small mb-0">
                Manage your personal account information and details.
            </p>
        </div>

        @auth('admin')
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-body-tertiary text-primary fw-medium py-3 px-3">
                            <i class="bi bi-person-circle me-2"></i>Personal Information
                        </div>

                        <div class="card-body p-3 p-md-4">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-body-secondary small mb-1">
                                        Full Name
                                    </label>
                                    <p class="fw-medium mb-0 text-break">
                                        {{ $record->name ?? 'N/A' }}
                                    </p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label text-body-secondary small mb-1">
                                        Email Address
                                    </label>
                                    <p class="fw-medium mb-0 text-break">
                                        {{ $record->email ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top py-3 px-3 px-md-4">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('backoffice.profile.edit') }}" class="btn btn-primary btn-sm px-3">
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit Profile
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endauth

    </main>
@endsection
