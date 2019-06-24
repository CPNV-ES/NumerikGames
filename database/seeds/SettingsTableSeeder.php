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

        Setting::create([
            'name' => 'robot_1-default_vers_1',
            'value' => 'Robot ou humain,',
        ]);

        Setting::create([
            'name' => 'robot_1-default_vers_2',
            'value' => 'Peau organique ou circuit numérique,',
        ]);

        Setting::create([
            'name' => 'robot_2-default_vers_1',
            'value' => 'Automate dans le théâtre des astres,',
        ]);

        Setting::create([
            'name' => 'robot_2-default_vers_2',
            'value' => 'Mon cœur hésite à se montrer.',
        ]);

        Setting::create([
            'name' => 'cyborg_1-default_vers_1',
            'value' => 'Une chair métallique, incandescente et grinçante,',
        ]);

        Setting::create([
            'name' => 'cyborg_1-default_vers_2',
            'value' => 'En éclats de miroir, reconstitue le composite que je suis.',
        ]);

        Setting::create([
            'name' => 'cyborg_2-default_vers_1',
            'value' => 'Creusant des bulles de rêveries flottantes et fleuries,',
        ]);

        Setting::create([
            'name' => 'cyborg_2-default_vers_2',
            'value' => 'Cette puce numérique est un cocon de malheureux leurres,',
        ]);

        Setting::create([
            'name' => 'ia_1-default_vers_1',
            'value' => 'Au seuil de nos limites : ouverture infinie,',
        ]);

        Setting::create([
            'name' => 'ia_1-default_vers_2',
            'value' => 'Le transfert rationnel de nos êtres,',
        ]);

        Setting::create([
            'name' => 'ia_2-default_vers_1',
            'value' => 'IA : cerveau électronique. Homme : esprit de Turing.',
        ]);

        Setting::create([
            'name' => 'ia_2-default_vers_2',
            'value' => 'Analyse de données. Synthèse. Erreur ?',
        ]);
    }
}
