<?php

use Illuminate\Database\Seeder;
use App\Prose;
use App\Theme;

/**
 * ProsesTableSeeder
 * Create all the proses
 *
 * @author Nicolas Henry
 */
class ProsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Prepare data to be send */
        $robotArray = [
            'Robot',
        ];

        $cyborgArray = [
            'Cyborg',
        ];

        $iaArray = [
            'IA',
        ];

        /* Get foreign keys */
        $robot    = Theme::where('name', 'Robot')->first();
        $cyborg   = Theme::where('name', 'Cyborg')->first();
        $ia       = Theme::where('name', 'IA')->first();
        $path     = "pictures/proses/";


        /* Insert data into the DB */
        for ($i = 1; $i <= App\Setting::where("name", "home_limit_prose")->first()->value; $i++) {
            foreach($robotArray as $value) {
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                    'path' => $path.Theme::where('name', $value)->first()->slug.'_'.$i.'.jpg'
                ]);
                $prose->theme()->associate($robot);
                $prose->save();
            }
        }

        for ($i = 1; $i <= App\Setting::where("name", "home_limit_prose")->first()->value; $i++) {
            foreach($cyborgArray as $value) {
                
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                    'path' => $path.Theme::where('name', $value)->first()->slug.'_'.$i.'.jpg'
                ]);
                $prose->theme()->associate($cyborg);
                $prose->save();
            }
        }

        for ($i = 1; $i <= App\Setting::where("name", "home_limit_prose")->first()->value; $i++) {
            foreach($iaArray as $value) {
                
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                    'path' => $path.Theme::where('name', $value)->first()->slug.'_'.$i.'.jpg'
                ]);
                $prose->theme()->associate($ia);
                $prose->save();
            }
        }

    }
}
