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
            'Robot',
            'Cyborg',
            'IA',
        ];

        $slugs = [
            'robot',
            'cyborg',
            'ia',
        ];

        $i = 0;
        foreach ($themes as $value) {

            $theme = Theme::create([
                'name' => $value,
                'color' => '#'.substr(md5(rand()), 0, 6),
                'slug' => $slugs[$i],
            ]);         
            $theme->save();
            $i++;
        }
    }
}
