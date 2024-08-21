<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    protected $kategori = ['olahraga', 'pendidikan', 'filsafat'];

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => 'Admin'
        ]);

        // User::factory(2)->create();

        // Book::factory(2)->create();

        foreach ($this->kategori as $data) {
            Category::factory()->create([
                'kategori' => $data
            ]);
        }
    }
}
