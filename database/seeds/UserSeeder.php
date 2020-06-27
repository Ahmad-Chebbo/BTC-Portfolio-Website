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
            'name' => 'Ahmad Shebbo',
            'email' => 'ahmadshebbo97@gmail.com',
            'password' => bcrypt('password'),
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'about' => "I'm a University Student studying Computer Science to get my Bachelor Degree. I got interested in web designing first class i took and i'm always interested in learning more.",
            'phone' => '76864760',
            'address' => 'Lebanon / Beirut',
            'street' => '1234 Barja Hakroun',
            'DOB' => '1997-08-07',
        ]);
    }
}
