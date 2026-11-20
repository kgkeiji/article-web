@extends('backoffice._layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Account Details</h5>
                    </div>
                    @auth('admin')
                        <div class="card-body">
                            <label>Name:</label>
                            <p>
                                {{ $record->name }}
                            </p>
                            <label>Email:</label>
                            <p>
                                {{ $record->email }}
                            </p>
                            <a href="{{ route('backoffice.profile.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
@endsection
