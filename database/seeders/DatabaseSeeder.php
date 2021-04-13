<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'email' => 'rhea.ardiente@mlhuillier.com',
            'password' => Hash::make('rhea2021')
        ]);

        DB::table('users')->insert([
            'email' => 'quency.atacador@mlhuillier.com',
            'password' => Hash::make('rhea2021')
        ]);

        DB::table('users')->insert([
            'email' => 'jonalyn.mobilla@mlhuillier.com',
            'password' => Hash::make('rhea2021')
        ]);
    }
}
