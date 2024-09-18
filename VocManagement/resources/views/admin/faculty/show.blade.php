@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Faculty Details</h2>
    <p><strong>Name:</strong> {{ $faculty->name }}</p>
    <p><strong>Email:</strong> {{ $faculty->email }}</p>
    <p><strong>Department:</strong> {{ $faculty->department }}</p>
    <a href="{{ route('admin.faculty.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
