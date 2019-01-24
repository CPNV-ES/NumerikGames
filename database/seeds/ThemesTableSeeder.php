<?php

use Illuminate\Database\Seeder;
use App\Theme;

/**
 * ThemesTableSeeder
 * Create all the themes
 *
 * @author Nicolas Henry
 */
class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amour = Theme::create([
            'name' => 'amour',
        ]);
        $amour->save();

        $nature = Theme::create([
            'name' => 'nature',
        ]);
        $nature->save();

        $robot = Theme::create([
            'name' => 'robots',
        ]);
        $robot->save();

        $imaginaire = Theme::create([
            'name' => 'imaginaire',
        ]);
        $imaginaire->save();

        $humour = Theme::create([
            'name' => 'humour',
        ]);
        $humour->save();

        $mer = Theme::create([
            'name' => 'mer',
        ]);
        $mer->save();

        $guerre = Theme::create([
            'name' => 'guerre',
        ]);
        $guerre->save();
    }
}
