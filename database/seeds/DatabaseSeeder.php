<?php

use Illuminate\Database\Seeder;
use App\Customer;
use Database\Seeders\OperationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //disable foreign key check for this connection before running seeders
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // $this->call(RolesTableSeeder::class);
        // $this->call(UserSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Noticeboard::class, 100)->create();
        //factory(App\Customer::class, 10)->create();
        //factory(App\Machine::class, 10)->create();

        // DB::table('operations')->insert([
        //     'name' => 'Stanzen',
        //     'user_id' => '1'

        // ]);
        // DB::table('operations')->insert([
        //     'name' => 'Bürsten',
        //     'user_id' => '10'

        // ]);
        // DB::table('operations')->insert([
        //     'name' => 'Plätieren',
        //     'user_id' => '11'

        // ]);
        // DB::table('operations')->insert([
        //     'name' => 'Lochen',
        //     'user_id' => '13'

        // ]);
    }
}
