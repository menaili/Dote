<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create([
            'number'=>'659357631',
            'user_id'=>'1',
            'adress_id'=>'1'
        ]);

        Phone::create([
            'number'=>'655487898',
            'user_id'=>'2',
            'adress_id'=>'1'
        ]);

        Phone::create([
            'number'=>'798589656',
            'user_id'=>'3',
            'adress_id'=>'1'
        ]);

        Phone::create([
            'number'=>'554566987',
            'user_id'=>'4',
            'adress_id'=>'1'
        ]);
    }
}
