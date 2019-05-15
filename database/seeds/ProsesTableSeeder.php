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
        $loveArray = [
            'Amour',
        ];

        $friendshipArray = [
            'Amitié',
        ];

        $deathArray = [
            'La mort',
        ];

        /* Get foreign keys */
        $love        = Theme::where('name', 'Amour')->first();
        $friendship  = Theme::where('name', 'Amitié')->first();
        $death       = Theme::where('name', 'La mort')->first();

        $theme = Theme::all();


        /* Insert data into the DB */
        for ($i = 1; $i <= 3; $i++) {
            foreach($loveArray as $value) {
                $path = Theme::where('name', $value)->first();
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                    'path' => $path->path
                ]);
                $prose->theme()->associate($love);
                $prose->save();
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            foreach($friendshipArray as $value) {
                $path = Theme::where('name', $value)->first();
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                    'path' => $path->path
                ]);
                $prose->theme()->associate($friendship);
                $prose->save();
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            foreach($deathArray as $value) {
                $path = Theme::where('name', $value)->first();
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                    'path' => $path->path
                ]);
                $prose->theme()->associate($death);
                $prose->save();
            }
        }

    }
}
