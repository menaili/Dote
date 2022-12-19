<?php

namespace Database\Seeders;
use App\Models\Link;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'application_id'=>'1',
            'user_id'=>'1',
            'name'=>'facebook',
            'url'=>'faceURL'
        ]);

        Link::create([
            'application_id'=>'2',
            'user_id'=>'1',
            'name'=>'instagram',
            'url'=>'instaURL'
        ]);

        Link::create([
            'application_id'=>'4',
            'user_id'=>'1',
            'name'=>'youtube',
            'url'=>'youtURL'
        ]);

//------------

        Link::create([
            'application_id'=>'1',
            'user_id'=>'2',
            'name'=>'facebook',
            'url'=>'faceURL'
        ]);

        Link::create([
            'application_id'=>'2',
            'user_id'=>'2',
            'name'=>'instagram',
            'url'=>'instaURL'
        ]);

        Link::create([
            'application_id'=>'3',
            'user_id'=>'2',
            'name'=>'linkedin',
            'url'=>'linkURL'
        ]);

        //------------

        Link::create([
            'application_id'=>'2',
            'user_id'=>'3',
            'name'=>'instagram',
            'url'=>'instaURL'
        ]);

        Link::create([
            'application_id'=>'3',
            'user_id'=>'3',
            'name'=>'linkedin',
            'url'=>'linkURL'
        ]);


                //------------
                Link::create([
                    'application_id'=>'1',
                    'user_id'=>'4',
                    'name'=>'facebook',
                    'url'=>'faceURL'
                ]);


                Link::create([
                    'application_id'=>'2',
                    'user_id'=>'4',
                    'name'=>'instagram',
                    'url'=>'instaURL'
                ]);
        
                Link::create([
                    'application_id'=>'3',
                    'user_id'=>'4',
                    'name'=>'linkedin',
                    'url'=>'linkURL'
                ]);

                Link::create([
                    'application_id'=>'4',
                    'user_id'=>'4',
                    'name'=>'youtube',
                    'url'=>'youtURL'
                ]);

    }
}
