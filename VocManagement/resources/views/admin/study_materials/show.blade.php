@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $studyMaterial->title }}</h1>

        {{-- Show Image --}}
        @if ($studyMaterial->image_path)
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $studyMaterial->image_path) }}" alt="Image"
                style="max-width: 300px; height: auto;">
        @else
            <p><strong>Image:</strong> No image uploaded</p>
        @endif

        <p><strong>Description:</strong> {{ $studyMaterial->description ?? 'No description available' }}</p>

        {{-- File --}}
        @if ($studyMaterial->file_path)
            <p><strong>File:</strong> <a href="{{ asset('storage/' . $studyMaterial->file_path) }}"
                    target="_blank">Download/View</a></p>
        @else
            <p><strong>File:</strong> No file uploaded</p>
        @endif

        {{-- Back, Edit, Delete buttons --}}
        <a href="{{ route('admin.study_materials.index') }}" class="btn btn-primary">Back to List</a>
        <a href="{{ route('admin.study_materials.edit', $studyMaterial->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('admin.study_materials.destroy', $studyMaterial->id) }}" method="POST"
            style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this material?')">Delete</button>
        </form>
    </div>
@endsection
