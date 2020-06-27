<?php

use Illuminate\Database\Seeder;

class MediaSettingSeeder extends Seeder
{
    public function run()
    {
        App\MediaSetting::create([
            'profile' => '/default-imgs/profile.jpg',
            'background' => '/default-imgs/background.jpg',
            'counter' => '/default-imgs/counter.jpg',
            'cv' => '/default-imgs/cv.pdf',
            'quote' => '/default-imgs/quote.jpg',
            'favicon' => '/default-imgs/favicon.png',
        ]);
    }
}
