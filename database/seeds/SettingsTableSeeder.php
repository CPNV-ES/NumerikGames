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
        
        Setting::create([
            'name' => 'theme_amour_helper',
            'value' => 'aime, Anel, mon amour, passion, Jarod, fréquentation, engouement, concubinage, coït, attachement, adultère',
        ]);
        
        Setting::create([
            'name' => 'theme_amitie_helper',
            'value' => 'mon ami, service, compliment, bonté, liaison, sex-friend, souris',
        ]);
        
        Setting::create([
            'name' => 'theme_la_mort_helper',
            'value' => 'mort, tristesse, violence, sex, viol, CPNV, détresse, consentement',
        ]);
    }
}
