<?php

namespace Database\Seeders;
use App\Models\Invitation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invitation::create([
            'sender'=> '2',
            'receiver'=> '1',            
        ]);

        Invitation::create([
            'sender'=> '3',
            'receiver'=> '1',            
        ]);
    }
}
