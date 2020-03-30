<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();
        $now = date("Y-m-d H:i:s");

        User::create([
            'name' => $faker->name('male'),
            'user_role' => 'admin',
            'login_id' => 'teguh',
            'email' => 'teguhpanjaitan@gmail.com',
            'password' => Hash::make('qwerty123'),
            'remarks' => '',
            'created_at' => $now,
            'updated_at' => $now,
            'updated_by' => '1',
            'locked' => '0'
        ]);
    }
}
