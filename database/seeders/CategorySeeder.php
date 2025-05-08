<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['title' => 'Automobiliai'],
            ['title' => 'Technologijos'],
            ['title' => 'Kelionės'],
        ];

        Category::insert($categories);
    }
}
