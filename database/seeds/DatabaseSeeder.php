<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SocialLinkSeeder::class);
        $this->call(ColorSettingSeeder::class);
        $this->call(MediaSettingSeeder::class);
        $this->call(SectionSettingSeeder::class);
        $this->call(MySeeder::class);
    }
}
