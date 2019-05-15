<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'limit_verses',
            'value' => '16',
        ]);

        Setting::create([
            'name' => 'limit_last_verses',
            'value' => '2',
        ]);

        Setting::create([
            'name' => 'syllabes',
            'value' => '12',
        ]);

        Setting::create([
            'name' => 'home_limit_prose',
            'value' => '3',
        ]);

        Setting::create([
            'name' => 'default_vers_1',
            'value' => 'Lorem ipsum dolor sit amet, consectetur',
        ]);

        Setting::create([
            'name' => 'default_vers_2',
            'value' => 'Adipiscing elit. Duis aliquet, nisl',
        ]);
    }
}
