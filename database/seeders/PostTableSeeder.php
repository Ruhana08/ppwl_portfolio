<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            Post::create([
                'title' => 'Post Judul Ke-'. $i,
                'description' => 'Deskripsi untuk post judul ke-' . $i,
                'status' => 'draft'
            ]);
        }
    }
}
