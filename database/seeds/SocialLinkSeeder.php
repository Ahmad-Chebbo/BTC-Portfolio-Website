<?php

use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SocialLink::create([
            'title' => 'Facebook',
            'icon' => 'fa-facebook-official',
            'url' => 'https://www.facebook.com/Inferno.X00',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Instagram',
            'icon' => 'fa-instagram',
            'url' => 'https://www.instagram.com/ahmad_shebbo/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Twitter',
            'icon' => 'fa-twitter',
            'url' => 'https://twitter.com/Ahmad_Shebbo',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Medium',
            'icon' => 'fa-medium',
            'url' => 'https://medium.com/@ahmadchebbo',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Github',
            'icon' => 'fa-github',
            'url' => 'https://github.com/AhmadShebbo',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Linked In',
            'icon' => 'fa-linkedin',
            'url' => 'https://www.linkedin.com/in/ahmad-chebbo-b99454148/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Whatsapp',
            'icon' => 'fa-whatsapp',
            'url' => 'https://whatsapp.com/',
        ]);

        App\SocialLink::create([
            'title' => 'Stack Overflow',
            'icon' => 'fa-stack-overflow',
            'url' => 'https://stackoverflow.com/users/10646351/ahmad-shebbo',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Youtube',
            'icon' => 'fa-youtube',
            'url' => 'https://youtube.com/',
        ]);

        App\SocialLink::create([
            'title' => 'Google Plus',
            'icon' => 'fa-google-plus',
            'url' => 'https://google.com/',
        ]);
    }
}
