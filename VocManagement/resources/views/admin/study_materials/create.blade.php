@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add New Study Material</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.study_materials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" value="{{ old('image') }}" required>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" class="form-control-file" value="{{ old('file') }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add Study Material</button>
        </form>
    </div>
@endsection
