<?php

use Illuminate\Database\Seeder;

class SectionSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\SectionSetting::create([
            'section' => 'Quote',
            'header' => 'Quote',
            'subtitle' => '<h5 class="font-color"><b>There is no secret to success</b></h5>
					<h5><b>It is the result of preparation, <span class="font-color">Hard work</span>,
					and learning from the failure.</b></h5>',
        ]);

        App\SectionSetting::create([
            'section' => 'Portfolio',
            'header' => 'Portfolio',
            'subtitle' => 'MY WORK',
        ]);

        App\SectionSetting::create([
            'section' => 'About me',
            'header' => 'About me',
            'subtitle' => 'PROFESSIONAL PATH',
        ]);

        App\SectionSetting::create([
            'section' => 'Work Experience',
            'header' => 'Work Experience',
            'subtitle' => 'PREVIOUS JOBS',
        ]);

        App\SectionSetting::create([
            'section' => 'Education',
            'header' => 'Education',
            'subtitle' => 'ACADEMIC CAREER',
        ]);

        App\SectionSetting::create([
            'section' => 'Counter',
            'header' => 'Counter',
            'subtitle' => '',
        ]);
    }
}
