<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Type;

class createTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type::create([
            'name' => 'Controle',
            'desc' => 'Plano Controle',
        ]);
        Type::create([
            'name' => 'Pós',
            'desc' => 'Plano Pós Pago',
        ]);
        Type::create([
            'name' => 'Pre',
            'desc' => 'Plano Pre Pago',
        ]);
    }
}
