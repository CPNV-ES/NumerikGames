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
            'proses_limit' => 20,
        ]);
        
        Setting::create([
            'name' => 'limit30',
            'proses_limit' => 30,
        ]);

        Setting::create([
            'name' => 'limit40',
            'proses_limit' => 40,
        ]);
    }
}
