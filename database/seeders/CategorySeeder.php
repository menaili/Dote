<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'social'
        ]);

        Category::create([
            'name'=>'bussines'
        ]);

        Category::create([
            'name'=>'media'
        ]);

        Category::create([
            'name'=>'store'
        ]);

        Category::create([
            'name'=>'gaming'
        ]);
    }
}
