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
            'Amour',
            'Amitié',
            'La mort',
            'La tristesse',
            'Le bonheur',
        ];


        foreach ($themes as $value) {
                $theme = Theme::create([
                    'name' => $value,
                    'color' => '#'.substr(md5(rand()), 0, 6),
                    'path' => 'pictures/themes/'.mb_strtolower(str_replace(' ', '_', $value), 'UTF-8').'.jpg',
                ]);
            $theme->save();
        }
    }
}
