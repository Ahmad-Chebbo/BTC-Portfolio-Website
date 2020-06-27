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
            'url' => 'https://www.facebook.com/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Instagram',
            'icon' => 'fa-instagram',
            'url' => 'https://www.instagram.com/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Twitter',
            'icon' => 'fa-twitter',
            'url' => 'https://twitter.com/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Medium',
            'icon' => 'fa-medium',
            'url' => 'https://medium.com/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Github',
            'icon' => 'fa-github',
            'url' => 'https://github.com/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Linked In',
            'icon' => 'fa-linkedin',
            'url' => 'https://www.linkedin.com/',
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
            'url' => 'https://stackoverflow.com/o',
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
