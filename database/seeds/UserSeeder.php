<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'about' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            'phone' => '00 000 000',
            'address' => 'Place / City',
            'street' => '1234 Lorem Ipsum',
            'DOB' => '1979-01-01',
        ]);
    }
}
