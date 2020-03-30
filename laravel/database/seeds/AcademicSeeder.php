<?php

use Illuminate\Database\Seeder;
use App\Academic;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academic::truncate();

        $faker = \Faker\Factory::create();
        $now = date("Y-m-d H:i:s");
        $date = date("Y-m-d");

        Academic::create([
            'number' => '1601-0005-49',
            'name' => $faker->name('male'),
            'date' => $date,
            'type' => 'CHARTERED DIPLOMA IN LOGISTICS MANAGEMENT',
            'awarded' => 'EDISON WORLD COLLEGE',
            'certified' => 'WORLD CERTIFICATION INSTITUTE',
            'updated_by' => '1',
            'created_at' => $now,
            'updated_at' => $now
        ]);

        Academic::create([
            'number' => '1601-0008-67',
            'name' => $faker->name('female'),
            'date' => $date,
            'type' => 'CHARTERED DIPLOMA IN PROCUREMENT MANAGEMENT',
            'awarded' => 'EDISON WORLD COLLEGE',
            'certified' => 'WORLD CERTIFICATION INSTITUTE',
            'updated_by' => '1',
            'created_at' => $now,
            'updated_at' => $now
        ]);

        Academic::create([
            'number' => '2112-1234-06',
            'name' => $faker->name('female'),
            'date' => $date,
            'type' => 'WCP (Marketing & Finance)',
            'awarded' => 'World Certification Institute (WCI)',
            'certified' => 'Credential Conferment Board',
            'updated_by' => '1',
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
