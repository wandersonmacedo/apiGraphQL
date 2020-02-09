<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Operator;

class CreateOperator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Operator::create(
            ['name' => "Tim"]
        );
        Operator::create(
            ['name' => "Oi"]
        );
        Operator::create(
            ['name' => "Vivo"]
        );
        Operator::create(
            ['name' => "Nextel"]
        );
        Operator::create(
            ['name' => "Claro"]
        );

    }
}
