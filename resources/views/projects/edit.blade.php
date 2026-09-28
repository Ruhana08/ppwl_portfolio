@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

<div class="content">

    <h1>Edit Project</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('projects.update', $project) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $project->title) }}"
            >

            @error('title')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                rows="4"
            >{{ old('description', $project->description) }}</textarea>

            @error('description')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>

            <textarea
                id="content"
                name="content"
                rows="8"
            >{{ old('content', $project->content) }}</textarea>

            @error('content')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>

            <input
                type="file"
                id="image"
                name="image"
                accept="image/*"
            >
        </div>

        <button type="submit" class="btn-add">
            Update Project
        </button>

    </form>

</div>

@endsection