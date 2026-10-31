
@extends('layouts.post-layout')

@section('title', 'Daftar Post')

@section('content')
<div class="content">
    <h1>Daftar Post</h1>

    {{-- Pencarian dan jumlah data --}}
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">

        <form action="{{ route('post.index') }}" method="GET"
              style="display: flex; gap: 8px;">
            <input
                type="text"
                name="search"
                placeholder="Cari judul post..."
                value="{{ $keyword ?? '' }}"
                style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
            >
            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            <button type="submit">Cari</button>

            @if (!empty($keyword))
                <a href="{{ route('post.index') }}">Reset</a>
            @endif
        </form>

        <form action="{{ route('post.index') }}" method="GET">
            <input type="hidden" name="search" value="{{ $keyword ?? '' }}">
            <label for="per_page">Tampilkan:</label>
            <select name="per_page" id="per_page" onchange="this.form.submit()">
                <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
            </select>
            data per halaman
        </form>
    </div>

    {{-- Tabel post --}}
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; background: white;">
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
                        <td colspan="4" style="padding: 16px; text-align: center;">
                            Post tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Informasi data --}}
    <div style="margin-top: 16px; color: #666; font-size: 14px;">
        Halaman: {{ $posts->currentPage() }} <br>
        Jumlah data: {{ $posts->total() }} <br>
        Data per halaman: {{ $posts->perPage() }}
    </div>

    {{-- Navigasi halaman --}}
    <div style="margin-top: 16px;">
        {{ $posts->withQueryString()->links() }}
    </div>
</div>
@endsection
