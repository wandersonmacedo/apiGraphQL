<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Type;

class CreateTypeSeeder extends Seeder
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
            'cod' => 'CONTROLE',
        ]);
        Type::create([
            'name' => 'Pós',
            'desc' => 'Plano Pós Pago',
            'cod' => 'POS',
        ]);
        Type::create([
            'name' => 'Pre',
            'desc' => 'Plano Pre Pago',
            'cod' => 'PRE',
        ]);
    }
}
