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

        $proses = [
            App\Setting::where("name", "default_vers_1")->first()->value,
            App\Setting::where("name", "default_vers_2")->first()->value,
        ];


        for ($i = 1; $i <= 2; $i++) {
            foreach ($proses as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 3; $i <= 4; $i++) {
            foreach ($proses as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 5; $i <= 6; $i++) {
            foreach ($proses as $value) {
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
