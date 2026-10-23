<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class RandomPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Belajar Laravel',
            'Tips Pemrograman',
            'Mengenal Database',
            'Pengembangan Web',
            'Tutorial PHP',
            'Belajar Framework',
            'Dasar Pagination',
            'Membuat Aplikasi',
            'Teknologi Informasi',
            'Pemrograman Web',
        ];

        for ($i = 1; $i <= 25; $i++) {
            Post::create([
                'title' => $titles[array_rand($titles)],
                'description' => 'Deskripsi post acak ke-' . $i,
                'status' => 'draft',
            ]);
        }
    }
}
