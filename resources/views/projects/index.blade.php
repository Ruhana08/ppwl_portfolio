@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<div class="content">

    @if (session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <h1>My Projects</h1>

    <a href="{{ route('projects.create') }}" class="btn-add">
        + Tambah Project
    </a>

    <div class="project-grid">

        @forelse ($projects as $project)

            <div class="project-card">

                @if ($project->image)
                    <img
                        src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}"
                        class="project-image"
                    >
                @else
                    <div class="project-image-placeholder">
                        No Image
                    </div>
                @endif

                <div class="project-card-content">

                    <h2>{{ $project->title }}</h2>

                    <p>{{ $project->description }}</p>

                    <a href="{{ route('projects.show', $project) }}" class="btn-action">
                        Lihat Detail
                    </a>

                </div>

            </div>

        @empty

            <p>Belum ada project.</p>

        @endforelse

    </div>

</div>

@endsection