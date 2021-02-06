<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = factory(App\Customer::class, 3)->create();
    }
}
