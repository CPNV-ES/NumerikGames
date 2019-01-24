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
        $amourArray = [
            'À Aimée D\'alton',
            'À celle que J\'aime',
            'À côté de moi',
            'Amour me Tue',
            'Le Funambule',
        ];

        $natureArray = [
            'Lettre a Eva',
            'Loin',
            'La Nature',
            'La Nature a l\'Homme',
        ];

        $robotArray = [
            'Avec ou sans',
            'Bob',
            'Les robots à Saint Tropez',
            'Roby le robot',
            'Les robots contre-attaquent',
        ];

        $imaginaireArray = [
            'Avec ou sans',
            'Regard Neuf',
            'La Musique des Rencontres',
        ];

        $humourArray = [
            'Le Rire dans la Faille',
            'Sourire ',
            'Un Sourire',
            'L\'habit d\'Arlequin',
        ];

        $merArray = [
            'Au Bord de la Mer',
            'Chant de la Mer',
            'Basse Mer',
            'Douce Plage ou Naquit mon Âme',
            'Gare au Bord de la Mer',
        ];

        $guerreArray = [
            'La Guerre',
            'On n\'est pas comme eux',
            'Oui, mais Ainsi Qu\'on Voit en la Guerre Civile',
            'Le sourire',
            'Résurgence',
        ];

        /* Get foreign keys */
        $amour          = Theme::where('name', 'amour')->first();
        $nature         = Theme::where('name', 'nature')->first();
        $robot          = Theme::where('name', 'robots')->first();
        $imaginaire     = Theme::where('name', 'imaginaire')->first();
        $humour         = Theme::where('name', 'humour')->first();
        $mer            = Theme::where('name', 'mer')->first();
        $guerre         = Theme::where('name', 'guerre')->first();

        /* Insert data into the DB */
        foreach($amourArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($amour);
            $prose->save();
        }

        foreach($natureArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($nature);
            $prose->save();
        }

        foreach($robotArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($robot);
            $prose->save();
        }

        foreach($imaginaireArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($imaginaire);
            $prose->save();
        }

        foreach($humourArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($humour);
            $prose->save();
        }

        foreach($merArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($mer);
            $prose->save();
        }

        foreach($guerreArray as $value) {
            $prose = Prose::create([
                'title' => $value,
            ]);
            $prose->theme()->associate($guerre);
            $prose->save();
        }

    }
}
