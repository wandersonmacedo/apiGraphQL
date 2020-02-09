<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator';
    public $name;
    public $planosDisponiveis;



    public function avaiablePlans(){
        return $this->morphMany('App/Http/Models/Plan','avaiablePlans');
    }

    public function getTypeByCode($cod){
        return Operator::where('cod',$cod)->firstOrFail()->id;
    }

}
