@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Study Materials</h1>
        <a href="{{ route('admin.study_materials.create') }}" class="btn btn-primary">Add New Study Material</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studyMaterials as $material)
                    <tr>
                        <td>
                            @if ($material->image_path)
                                <img src="{{ asset('storage/' . $material->image_path) }}" alt="Image" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $material->title }}</td>
                        <td>{{ $material->description }}</td>
                        <td>
                            @if ($material->file_path)
                                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">View File</a>
                            @else
                                No File
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.study_materials.show', $material->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.study_materials.edit', $material->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.study_materials.destroy', $material->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
