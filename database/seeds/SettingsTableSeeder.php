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
            'name' => 'syllabes',
            'value' => '12',
        ]);
    }
}
