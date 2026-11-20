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
                                {{ auth('admin')->user()->name }}

                            </p>
                            <label>Email:</label>
                            <p>
                                {{ auth('admin')->user()->email }}
                            </p>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
@endsection
