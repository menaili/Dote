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
        //***********---SOCIAL MEDIA---*************************/
        Application::create([
            'name'=>'Facebook',
            'icon'=>'/icons/facebook.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Instagram',
            'icon'=>'/icons/instagram.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Twitter',
            'icon'=>'/icons/twitter.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Whatsapp',
            'icon'=>'/icons/whatsapp.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Telegram',
            'icon'=>'/icons/telegram.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Messenger',
            'icon'=>'/icons/messenger.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Skype',
            'icon'=>'/icons/skype.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'VK',
            'icon'=>'/icons/vk.png',
            'category_id'=>'1'
        ]);

        //***********---END SOCIAL MEDIA---*************************/


        //***********---BUSINESS---*************************/

        Application::create([
            'name'=>'linkedin',
            'icon'=>'/icons/linkedin.png',
            'category_id'=>'2'
        ]);

        //***********---END BUSINESS---*************************/

        //***********---MEDIA---*************************/

        Application::create([
            'name'=>'youtube',
            'icon'=>'/icons/youtube.png',
            'category_id'=>'3'
        ]);

        //***********---END MEDIA---*************************/

    }
}
