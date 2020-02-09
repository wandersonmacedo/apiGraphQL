<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Prefix;

class AvailablePrefixForPlan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Prefix::create([
            "country" => "BR",
            "country_code" => "+55",
            "city" => "RJ",
            "city_code" => "21",
        ]);

        Prefix::create([
            "country" => "BR",
            "country_code" => "+55",
            "city" => "SP",
            "city_code" => "11",
        ]);

        Prefix::create([
            "country" => "BR",
            "country_code" => "+55",
            "city" => "BA",
            "city_code" => "77",
        ]);


    }
}

