<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
public function index()
{
    $keyword = request('search');

    $perPage = (int) request('per_page', 10);

    if (!in_array($perPage, [5, 10, 25])) {
        $perPage = 10;
    }

    $posts = Post::query()
        ->when($keyword, function ($query, $keyword) {
            $query->where('title', 'like', '%' . $keyword . '%');
        })
        ->paginate($perPage)
        ->withQueryString();

    return view('posts.index', compact('posts', 'keyword'));
}
}
