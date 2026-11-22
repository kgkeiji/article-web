@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-grow-1 p-3 p-md-4 p-lg-5" style="min-width:0">

        <div class="mb-4">
            <h3 class="fw-medium mb-1">Account Details</h3>
            <p class="text-primary fw-medium small mb-0">
                View user account information
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-body-tertiary text-primary fw-medium py-3 px-3">
                        <i class="bi bi-person-circle me-2"></i>Personal Information
                    </div>

                    <div class="card-body p-3 p-md-4 ">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label text-body-secondary small mb-1">
                                    Name
                                </label>
                                <p class="fw-medium mb-0">
                                    {{ $record->name ?? 'N/A' }}
                                </p>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label text-body-secondary small mb-1">
                                    Email Address
                                </label>
                                <p class="fw-medium mb-0">
                                    {{ $record->email ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top py-3 px-3 px-md-4">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('backoffice.account-management.index-portal') }}"
                                class="btn btn-light border btn-sm px-3">
                                <i class="bi bi-arrow-left me-1"></i> Back
                            </a>

                            <a href="{{ route('backoffice.account-management.edit-portal', $record->id) }}"
                                class="btn btn-primary btn-sm px-3">
                                <i class="bi bi-pencil-square me-1"></i> Edit Account
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
