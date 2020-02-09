<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Operator;

class CreateOperatorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Operator::create([
            'name' => "Tim",
            'cod' => "TIM"
            ]);
        Operator::create([
            'name' => "Oi",
            'cod' => "OI"
            ]);
        Operator::create([
            'name' => "Vivo",
            'cod' => "VIVO",
            ]);
        Operator::create([
            'name' => "Nextel",
            'cod' => "NEXTEL"
            ]);
        Operator::create([
            'name' => "Claro",
            'cod' => "CLARO"
            ]);

    }
}
