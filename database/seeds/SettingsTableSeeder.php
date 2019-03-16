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
            'value' => '20',
        ]);
        
        Setting::create([
            'name' => 'limit30',
            'value' => '30',
        ]);

        Setting::create([
            'name' => 'limit40',
            'value' => '40',
        ]);
    }
}
