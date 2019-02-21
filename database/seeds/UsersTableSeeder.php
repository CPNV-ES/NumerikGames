<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = User::create([
            'name'   => 'root',
            'email'    => 'root@numerikgames.ch',
            'password'    => bcrypt('secret'),
        ]);
    }
}
