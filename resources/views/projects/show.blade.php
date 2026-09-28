@extends('layouts.app')

@section('title', $project->title)

@section('content')

<div class="content">

    <h1>{{ $project->title }}</h1>

    <p>{{ $project->description }}</p>

    <h2>Detail Project</h2>

    <p>{{ $project->content }}</p>

    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
    @endif

    <br><br>

    <a href="{{ route('projects.index') }}">
        ← Kembali ke Projects
    </a>

</div>

@endsection