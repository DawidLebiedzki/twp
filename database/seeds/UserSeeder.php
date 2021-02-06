<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();


        $gottRole = Role::where('name', 'gott')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $gott = User::create([

            'name' => 'Dawid Lebiedzki',
            'username' => '100',
            'password' => Hash::make('password')
        ]);

        $admin = User::create([

            'name' => 'Andrej Koth',
            'username' => '200',
            'password' => Hash::make('password')
        ]);

        $user = User::create([

            'name' => 'Crisoph Blume',
            'username' => '300',
            'password' => Hash::make('password')
        ]);

        $gott->roles()->attach($gottRole);
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
