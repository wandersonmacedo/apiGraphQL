<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    public $name;
    public $planosDisponiveis;



    public function avaiablePlans(){
        return $this->morphMany('App/Http/Models/Plan','avaiablePlans');
    }

}
