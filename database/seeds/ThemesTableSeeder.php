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

        $themes = [
            'amour',
            'nature',
            'robots',
            'imaginaire',
            'humour',
            /* 'mer',
            'guerre', */
        ];

        foreach ($themes as $value) {
            $theme = Theme::create([
                'name' => $value,
                'path' => ''
            ]);
            $theme->save();
        }
    }
}
