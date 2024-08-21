<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(rand(2, 4)),
            'kategori_id' => rand(2,3),
            'user_id' => rand(2,3),
            'deskripsi' => fake()->paragraph(3),
            'jumlah' => rand(5, 12),
            'file_buku' => 'belum ada',
            'cover_buku' => '/img/cover-buku.jpg'
        ];
    }
}
