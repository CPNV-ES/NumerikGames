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
        $sadness     = Theme::where('name', 'La tristesse')->first();
        $happiness   = Theme::where('name', 'Le bonheur')->first();

        /* Insert data into the DB */
        foreach($loveArray as $value) {
            $prose = Prose::create([
                'title' => $value,
                'is_full' => rand(0,1),
            ]);
            $prose->theme()->associate($love);
            $prose->save();
        }

        foreach($friendshipArray as $value) {
            $prose = Prose::create([
                'title' => $value,
                'is_full' => rand(0,1),
            ]);
            $prose->theme()->associate($friendship);
            $prose->save();
        }

        foreach($deathArray as $value) {
            $prose = Prose::create([
                'title' => $value,
                'is_full' => rand(0,1),
            ]);
            $prose->theme()->associate($death);
            $prose->save();
        }

        foreach($sadnessArray as $value) {
            $prose = Prose::create([
                'title' => $value,
                'is_full' => rand(0,1),
            ]);
            $prose->theme()->associate($sadness);
            $prose->save();
        }

        foreach($happinessArray as $value) {
            $prose = Prose::create([
                'title' => $value,
                'is_full' => rand(0,1),
            ]);
            $prose->theme()->associate($happiness);
            $prose->save();
        }

    }
}
