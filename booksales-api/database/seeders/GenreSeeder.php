<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        Genre::create([
            'name' => 'Fiksi',
            'description' => 'Genre yang berisi cerita rekaan atau khayalan.',
        ]);

        Genre::create([
            'name' => 'Non-Fiksi',
            'description' => 'Genre yang berisi fakta dan informasi nyata.',
        ]);

        Genre::create([
            'name' => 'Komik',
            'description' => 'Genre buku berupa gambar dengan cerita berkelanjutan.',
        ]);

        Genre::create([
            'name' => 'Fantasi',
            'description' => 'Genre yang mengandung unsur magis dan dunia imajinatif.',
        ]);

        Genre::create([
            'name' => 'Dystopia',
            'description' => 'Genre yang menggambarkan dunia masa depan yang suram dan menakutkan.',
        ]);
    }
}
