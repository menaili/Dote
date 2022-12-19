<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create([
            'name'=>'facebook',
            'icon'=>'social',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'instagram',
            'icon'=>'social',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'linkedin',
            'icon'=>'bussiness',
            'category_id'=>'2'
        ]);

        Application::create([
            'name'=>'youtube',
            'icon'=>'media',
            'category_id'=>'3'
        ]);
    }
}
