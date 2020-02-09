<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CreateTypeSeeder::class);
         $this->call(CreateOperatorSeed::class);
         $this->call(AvailablePrefixForPlan::class);
    }
}
