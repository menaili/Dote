<?php

namespace Database\Seeders;

use App\Models\Adress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adress::create([
            'code'=>'+213',
            'name'=>'dz',
            'flag'=>'dzflag'
        ]);

        Adress::create([
            'code'=>'+33',
            'name'=>'fr',
            'flag'=>'frflag'
        ]);
    }
}
