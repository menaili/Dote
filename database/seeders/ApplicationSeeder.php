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

        Application::create([
            'name'=>'Tinder',
            'icon'=>'/icons/tinder.png',
            'category_id'=>'1'
        ]);

        Application::create([
            'name'=>'Twitch',
            'icon'=>'/icons/twitch.png',
            'category_id'=>'1'
        ]);

        //***********---END SOCIAL MEDIA---*************************/
        //************************************/
















        //************************************/
        //***********---BUSINESS---*************************/

        Application::create([
            'name'=>'Linkedin',
            'icon'=>'/icons/linkedin.png',
            'category_id'=>'2'
        ]);

        Application::create([
            'name'=>'Behance',
            'icon'=>'/icons/behance.png',
            'category_id'=>'2'
        ]);

        Application::create([
            'name'=>'Paypal',
            'icon'=>'/icons/paypal.png',
            'category_id'=>'2'
        ]);


        //***********---END BUSINESS---*************************/
        //************************************/















        //************************************/
        //***********---MEDIA---*************************/

        Application::create([
            'name'=>'Youtube',
            'icon'=>'/icons/youtube.png',
            'category_id'=>'3'
        ]);

        Application::create([
            'name'=>'Netflix',
            'icon'=>'/icons/netflix.png',
            'category_id'=>'3'
        ]);

        Application::create([
            'name'=>'Spotify',
            'icon'=>'/icons/spotify.png',
            'category_id'=>'3'
        ]);

        Application::create([
            'name'=>'SoundCloud',
            'icon'=>'/icons/SoundCloud.png',
            'category_id'=>'3'
        ]);

        Application::create([
            'name'=>'Apple music',
            'icon'=>'/icons/apple music 2.png',
            'category_id'=>'3'
        ]);

        //***********---END MEDIA---*************************/
        //************************************/















        //************************************/
        //***********---STORE---**********************/
        Application::create([
            'name'=>'play store',
            'icon'=>'/icons/play store.png',
            'category_id'=>'4'
        ]);

        Application::create([
            'name'=>'app store',
            'icon'=>'/icons/app store.png',
            'category_id'=>'4'
        ]);

        Application::create([
            'name'=>'amazone',
            'icon'=>'/icons/amazone.png',
            'category_id'=>'4'
        ]);

        Application::create([
            'name'=>'ebay',
            'icon'=>'/icons/ebay.png',
            'category_id'=>'4'
        ]);
        //***********---END STORE---**********************/        
        //************************************/


















        //************************************/
        //***********---GAMING---**********************/
        Application::create([
            'name'=>'Epic Games',
            'icon'=>'/icons/epic games.png',
            'category_id'=>'5'
        ]);

        Application::create([
            'name'=>'Playstation',
            'icon'=>'/icons/playstation.png',
            'category_id'=>'5'
        ]);

        Application::create([
            'name'=>'Xbox',
            'icon'=>'/icons/xbox.png',
            'category_id'=>'5'
        ]);

        //***********---END GAMING---**********************/
        //************************************/

    }
}
