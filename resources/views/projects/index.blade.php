
@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="content">
    <h1>Daftar Post</h1>

    {{-- Pencarian dan pilihan jumlah data --}}
    <div style="display: flex; justify-content: space-between;
                align-items: center; gap: 12px;
                flex-wrap: wrap; margin-bottom: 20px;">

        <form action="{{ route('projects.index') }}" method="GET"
              style="display: flex; gap: 8px; flex-wrap: wrap;">
            <input
                type="text"
                name="search"
                placeholder="Cari judul post..."
                value="{{ $keyword ?? '' }}"
                style="padding: 8px; border: 1px solid #ccc;"
            >

            <input type="hidden" name="per_page"
                   value="{{ $posts->perPage() }}">

            <button type="submit">Cari</button>

            @if (!empty($keyword))
                <a href="{{ route('projects.index') }}">Reset</a>
            @endif
        </form>

        <form action="{{ route('projects.index') }}" method="GET">
            <input type="hidden" name="search"
                   value="{{ $keyword ?? '' }}">

            <label for="per_page">Data per halaman:</label>

            <select name="per_page" id="per_page"
                    onchange="this.form.submit()">
                <option value="5" {{ $posts->perPage() == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $posts->perPage() == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ $posts->perPage() == 25 ? 'selected' : '' }}>25</option>
            </select>
        </form>
    </div>

    {{-- Tabel post --}}
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f3f4f6; text-align: left;">
                    <th style="padding: 12px; border: 1px solid #ddd;">No.</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Judul</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Deskripsi</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            {{ $posts->firstItem() + $loop->index }}
                        </td>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            {{ $post->title }}
                        </td>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            {{ $post->description }}
                        </td>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            {{ $post->status }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"
                            style="padding: 16px; text-align: center;">
                            Post tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Informasi pagination --}}
    <div style="margin-top: 16px;">
        Halaman: {{ $posts->currentPage() }} <br>
        Jumlah data: {{ $posts->total() }} <br>
        Data per halaman: {{ $posts->perPage() }}
    </div>

    {{-- Navigasi pagination --}}
    <div style="margin-top: 16px;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
