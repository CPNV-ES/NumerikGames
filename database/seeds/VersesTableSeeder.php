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

        $robot1 = [
            App\Setting::where("name", "robot_1-default_vers_1")->first()->value,
            App\Setting::where("name", "robot_1-default_vers_2")->first()->value,
        ];

        $robot2 = [
            App\Setting::where("name", "robot_2-default_vers_1")->first()->value,
            App\Setting::where("name", "robot_2-default_vers_2")->first()->value,
        ];

        $cyborg1 = [
            App\Setting::where("name", "cyborg_1-default_vers_1")->first()->value,
            App\Setting::where("name", "cyborg_1-default_vers_2")->first()->value,
        ];

        $cyborg2 = [
            App\Setting::where("name", "cyborg_2-default_vers_1")->first()->value,
            App\Setting::where("name", "cyborg_2-default_vers_2")->first()->value,
        ];

        $ia1 = [
            App\Setting::where("name", "ia_1-default_vers_1")->first()->value,
            App\Setting::where("name", "ia_1-default_vers_2")->first()->value,
        ];

        $ia2 = [
            App\Setting::where("name", "ia_2-default_vers_1")->first()->value,
            App\Setting::where("name", "ia_2-default_vers_2")->first()->value,
        ];


        for ($i = 1; $i <= 1; $i++) {
            foreach ($robot1 as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 2; $i <= 2; $i++) {
            foreach ($robot2 as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 3; $i <= 3; $i++) {
            foreach ($cyborg1 as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 4; $i <= 4; $i++) {
            foreach ($cyborg2 as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 5; $i <= 5; $i++) {
            foreach ($ia1 as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 6; $i <= 6; $i++) {
            foreach ($ia2 as $value) {
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
