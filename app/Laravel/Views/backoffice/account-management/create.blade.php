```blade
@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-grow-1 p-3 p-md-4 p-lg-5" style="min-width:0">

        <div class="mb-4">
            <h3 class="fw-medium mb-1">Create Account</h3>
            <p class="text-primary fw-medium small mb-0">
                Register a new user account
            </p>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-body-tertiary text-primary fw-medium py-3 px-3">
                <i class="bi bi-person-plus me-2"></i>Account Information
            </div>

            <div class="card-body p-3 p-md-4">
                <form method="POST" action="">
                    @csrf
                    <div class="row g-3">
                        {{-- name --}}
                        <div class="col-12">
                            <label for="name" class="form-label fw-medium">
                                Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" placeholder="John Doe" required>
                        </div>
                        {{-- email --}}
                        <div class="col-12">
                            <label for="email" class="form-label fw-medium">
                                Email Address <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" placeholder="name@example.com" required>
                        </div>
                        {{-- password --}}
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-medium">
                                Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter password" required>
                        </div>
                        {{-- confirm --}}
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-medium">
                                Confirm Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="Confirm password" required>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer bg-white border-top py-3 px-3 px-md-4">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-light border btn-sm px-3">
                        Cancel
                    </a>
                    <button type="submit" class="submit-btn btn btn-primary btn-sm px-3">
                        <i class="bi bi-person-plus me-1"></i> Create Account
                    </button>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.querySelector('.submit-btn');
            const form = submitBtn?.closest('.card')?.querySelector('form');

            if (!submitBtn || !form) return;

            submitBtn.addEventListener('click', function(event) {
                event.preventDefault();

                if (!form.reportValidity()) return;

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to register with the provided information?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, register!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
```
