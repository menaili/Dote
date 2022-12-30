<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Menaili Haroun Errachide',
            'email'=> 'menailimic@gmail.com',
            'position'=> 'Backend',
            'password'=> Hash::make('profilo2023')
        ]);


        User::create([
            'name'=> 'Farhi Oussama baha',
            'email'=> 'farhiouss@gmail.com',
            'position'=> 'frontend',
            'password'=> Hash::make('profilo2023')

        ]);

        User::create([
            'name'=> 'Jakoub',
            'email'=> 'jakoub16@gmail.com',
            'position'=> 'ui designer',
            'password'=> Hash::make('profilo2023')

        ]);

        User::create([
            'name'=> 'Riyad Djeddah',
            'email'=> 'riyad41@gmail.com',
            'position'=> 'frontend',
            'password'=> Hash::make('profilo2023')

        ]);
    }
}
