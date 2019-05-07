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
            'name' => 'default_limit',
            'value' => '16',
        ]);
        
        Setting::create([
            'name' => 'limit30',
            'value' => '30',
        ]);

        Setting::create([
            'name' => 'limit40',
            'value' => '40',
        ]);

        Setting::create([
            'name' => 'syllabes',
            'value' => '12',
        ]);
    }
}
