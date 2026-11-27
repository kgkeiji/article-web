@extends('portal._layouts.main')

@section('content')
    <div class="d-flex">
        <main class="flex-grow-1 p-3 p-md-4 p-lg-5" style="min-width:0">
            <div class="mb-4">
                <h2 class="h3 fw-medium mb-1">Edit Profile</h2>
                <p class="text-primary mb-0">
                    Update your personal information and account credentials.
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <form action="{{ route('portal.profile.update') }}" method="POST">
                            @csrf
                            <div class="card-body p-3 p-md-4">
                                <div class="row g-3">
                                    {{-- name --}}
                                    <div class="col-12">
                                        <label for="name" class="form-label fw-semibold">
                                            Name
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $record->name) }}" placeholder="Enter your full name">
                                    </div>
                                    @if ($errors->first('name'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('name') }}
                                            </small>
                                        </div>
                                    @endif
                                    {{-- email --}}
                                    <div class="col-12">
                                        <label for="email" class="form-label fw-semibold">
                                            Email Address
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $record->email) }}"
                                            placeholder="Enter your email address">
                                        @if ($errors->first('email'))
                                            <div class="text-left">
                                                <small class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="my-4 text-body-secondary opacity-25">
                                <div class="row g-3">
                                    {{-- password --}}
                                    <div class="col-12">
                                        <label for="password" class="form-label fw-semibold">
                                            New Password
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter a new password">
                                        @if ($errors->first('password'))
                                            <div class="text-left">
                                                <small class="text-danger">
                                                    {{ $errors->first('password') }}
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- confirm --}}
                                    <div class="col-12">
                                        <label for="password_confirmation" class="form-label fw-semibold">
                                            Confirm New Password
                                        </label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm your new password">
                                        @if ($errors->first('password'))
                                            <div class="text-left">
                                                <small class="text-danger">
                                                    {{ $errors->first('password') }}
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-top p-3 p-md-4">
                                <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

                                    <a href="{{ route('portal.profile.show') }}" class="btn btn-light border px-4">
                                        Cancel
                                    </a>
                                    <button type="submit" class="submit-btn btn btn-primary px-4">
                                        <i class="bi bi-check2-circle me-1"></i>
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.querySelector('.submit-btn');
            const form = submitBtn?.closest('form');

            if (!form) return;

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Save Changes?',
                    text: 'Are you sure you want to update your account information?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, save changes',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
