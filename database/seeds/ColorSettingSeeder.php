<?php

use Illuminate\Database\Seeder;

class ColorSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ColorSetting::create([
            'primary' => '#0000FF',
            'secondary' => '#333333',
            'footer' => '#28023D',
        ]);
    }
}
