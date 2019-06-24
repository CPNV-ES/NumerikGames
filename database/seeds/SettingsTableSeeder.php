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
            'value' => '2',
        ]);

        Setting::create([
            'name' => 'home_limit_theme',
            'value' => '3',
        ]);

        Setting::create([
            'name' => 'default_vers_robot-1',
            'value' => 'Lorem ipsum dolor sit amet, consectetur',
        ]);

        Setting::create([
            'name' => 'default_vers_robot-2',
            'value' => 'Adipiscing elit. Duis aliquet, nisl',
        ]);

        Setting::create([
            'name' => 'default_vers_cyborg-1',
            'value' => 'Lorem ipsum dolor sit amet, consectetur',
        ]);

        Setting::create([
            'name' => 'default_vers_cyborg-2',
            'value' => 'Adipiscing elit. Duis aliquet, nisl',
        ]);

        Setting::create([
            'name' => 'default_vers_ia-1',
            'value' => 'Lorem ipsum dolor sit amet, consectetur',
        ]);

        Setting::create([
            'name' => 'default_vers_ia-2',
            'value' => 'Adipiscing elit. Duis aliquet, nisl',
        ]);
        
        Setting::create([
            'name' => 'theme_robot_helper',
            'value' => 'androïde, appareil, automate, humanoïde, machine',
        ]);
        
        Setting::create([
            'name' => 'theme_cyborg_helper',
            'value' => 'mécananthrope, machine, humanoïde, chose',
        ]);
        
        Setting::create([
            'name' => 'theme_ia_helper',
            'value' => 'être, machine, chose, intelligence, pensée',
        ]);
    }
}
