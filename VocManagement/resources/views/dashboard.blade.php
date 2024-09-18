@extends('layouts.app')

@section('content')
    <h3 class="mt-4">Welcome, {{ $user->name }}</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
