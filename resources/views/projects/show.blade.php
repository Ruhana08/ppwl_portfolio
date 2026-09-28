@extends('layouts.app')

@section('title', $project->title)

@section('content')


<div class="content">
    <a href="{{ route('projects.index') }}" class="back-link">
        ← Kembali ke Projects
    </a>

    <h1><b>{{ $project->title }}</b></h1>

    <p>{{ $project->description }}</p>
    <br>

    <h2><b>Detail Project</b></h2>

    <p>{{ $project->content }}</p>

    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
    @endif

    <br><br>

    <div class="project-actions">

        <div class="action-buttons">

            <a href="{{ route('projects.edit', $project) }}" class="btn-action">
                Edit Project
            </a>

            <form
                action="{{ route('projects.destroy', $project) }}"
                method="POST"
                onsubmit="return confirm('Apakah kamu yakin ingin menghapus project ini?')"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="btn-delete">
                    Delete Project
                </button>
            </form>

        </div>

    </div>
</div>

@endsection