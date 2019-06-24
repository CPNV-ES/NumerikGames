<?php

use Illuminate\Database\Seeder;
use App\Prose;
use App\Verse;

/**
 * VersesTableSeeder
 * Create all the verses
 *
 * @author Nicolas Henry
 */
class VersesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $robot = [
            App\Setting::where("name", "default_vers_cyborg-1")->first()->value,
            App\Setting::where("name", "default_vers_cyborg-2")->first()->value,
        ];

        $cyborg = [
            App\Setting::where("name", "default_vers_cyborg-1")->first()->value,
            App\Setting::where("name", "default_vers_cyborg-2")->first()->value,
        ];

        $ia = [
            App\Setting::where("name", "default_vers_cyborg-1")->first()->value,
            App\Setting::where("name", "default_vers_cyborg-2")->first()->value,
        ];


        for ($i = 1; $i <= 2; $i++) {
            foreach ($robot as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 3; $i <= 4; $i++) {
            foreach ($cyborg as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 5; $i <= 6; $i++) {
            foreach ($ia as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }
    }
}
