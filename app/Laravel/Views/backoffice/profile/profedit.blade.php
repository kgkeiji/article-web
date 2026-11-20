@extends('backoffice._layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.profile.update') }}" method="POST">
                        @csrf
                        <div class="card-body p-4 p-md-5">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $record->name) }}" required>
                                    @if ($errors->first('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $record->email) }}" required>
                                    @if ($errors->first('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>

                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="new-password">
                                @if ($errors->first('password'))
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" autocomplete="new-password">
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="submit-btn btn bsb-btn-xl btn-primary" type="submit">Edit
                                        Account</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.querySelector('.submit-btn');
            const form = submitBtn.closest('form');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to update with the provided information?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
