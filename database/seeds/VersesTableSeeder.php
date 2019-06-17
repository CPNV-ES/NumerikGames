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
            'Lorem ipsum dolor sit amet, consectetur',
            'Adipiscing elit. Duis aliquet, nisl',
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

        for ($i = 3; $i <= 5; $i++) {
            foreach ($proses as $value) {
                $verse = Verse::create([
                    'content'   => $value,
                    'status'    => 1,
                ]);
                $verse->prose()->associate($i);
                $verse->save();
            }
        }

        for ($i = 6; $i <= 9; $i++) {
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
