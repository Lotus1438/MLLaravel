<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make('quency2021')
        ]);

        DB::table('users')->insert([
            'email' => 'jonalyn.mobilla@mlhuillier.com',
            'password' => Hash::make('jonalyn2021')
        ]);

        DB::table('users')->insert([
            'email' => 'shenna.caneda@mlhuillier.com',
            'password' => Hash::make('shenna2021')
        ]);

        DB::table('users')->insert([
            'email' => 'reina.mates@mlhuillier.com',
            'password' => Hash::make('mates2021')
        ]);

        DB::table('users')->insert([
            'email' => 'jenie.tomalon@mlhuillier.com',
            'password' => Hash::make('jenie2021')
        ]);
    }
}
