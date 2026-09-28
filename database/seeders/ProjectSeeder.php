<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'Website portfolio pribadi untuk menampilkan profil dan project.',
            'content' => 'Website ini dibuat menggunakan Laravel dan Blade sebagai bagian dari pembelajaran pengembangan web.',
            'image' => null,
        ]);

        Project::create([
            'title' => 'Corta Sports Management',
            'description' => 'Sistem pengelolaan booking lapangan olahraga.',
            'content' => 'Corta Sports Management merupakan aplikasi untuk mengelola data venue, lapangan, jadwal, booking, dan pembayaran.',
            'image' => null,
        ]);

        Project::create([
            'title' => 'SI Vonic',
            'description' => 'Website polling untuk kegiatan Departemen TEDI SV UGM.',
            'content' => 'SI Vonic merupakan sistem polling yang digunakan untuk membantu proses pemilihan paket wisata dan desain kaos.',
            'image' => null,
        ]);

    }
}
