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
            'Première soirée',
        ];

        $friendshipArray = [
            'A M. A. T.',
        ];

        $deathArray = [
            'Ce que c’est que la mort',
        ];

        $sadnessArray = [
            'Clair de lune',
        ];

        $happinessArray = [
            'Printemps',
        ];

        /* Get foreign keys */
        $love        = Theme::where('name', 'Amour')->first();
        $friendship  = Theme::where('name', 'Amitié')->first();
        $death       = Theme::where('name', 'La mort')->first();

        /* Insert data into the DB */
        for ($i = 1; $i <= 3; $i++) {
            foreach($loveArray as $value) {
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 1,
                ]);
                $prose->theme()->associate($love);
                $prose->save();
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            foreach($friendshipArray as $value) {
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 0,
                ]);
                $prose->theme()->associate($friendship);
                $prose->save();
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            foreach($deathArray as $value) {
                $prose = Prose::create([
                    'title' => $value,
                    'is_full' => 1,
                ]);
                $prose->theme()->associate($death);
                $prose->save();
            }
        }

    }
}
