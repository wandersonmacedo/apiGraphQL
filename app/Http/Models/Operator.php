<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator';
    public $name;
    public $planosDisponiveis;



    public function getOperatorByCode($cod){
        return Self::where('cod',$cod)->firstOrFail()->id;
    }



}
