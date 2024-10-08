@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Study Material</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.study_materials.update', $studyMaterial->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
                @if ($studyMaterial->image_path)
                    <img src="{{ asset('storage/' . $studyMaterial->image_path) }}" alt="Image" width="100"
                        class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $studyMaterial->title) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $studyMaterial->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="file">File (optional)</label>
                <input type="file" name="file" class="form-control-file">
                @if ($studyMaterial->file_path)
                    <p>Current File: <a href="{{ asset('storage/' . $studyMaterial->file_path) }}" target="_blank">View
                            File</a></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Study Material</button>
        </form>
    </div>
@endsection
