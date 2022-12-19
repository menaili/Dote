<?php

namespace Database\Seeders;

use App\Models\Freind;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FreindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Freind::create([
            'user_id'=>'1',
            'freind_id'=>'2'
        ]);

        Freind::create([
            'user_id'=>'1',
            'freind_id'=>'3'
        ]);

        Freind::create([
            'user_id'=>'1',
            'freind_id'=>'4'
        ]);

        //-------------2

        Freind::create([
            'user_id'=>'2',
            'freind_id'=>'1'
        ]);

        Freind::create([
            'user_id'=>'2',
            'freind_id'=>'4'
        ]);

        //-------------3

        Freind::create([
            'user_id'=>'3',
            'freind_id'=>'2'
        ]);

        Freind::create([
            'user_id'=>'3',
            'freind_id'=>'4'
        ]);

        //------------4
        Freind::create([
            'user_id'=>'4',
            'freind_id'=>'2'
        ]);

        Freind::create([
            'user_id'=>'4',
            'freind_id'=>'3'
        ]);

        Freind::create([
            'user_id'=>'4',
            'freind_id'=>'1'
        ]);
    }
}
