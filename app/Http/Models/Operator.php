<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator';




    public function getOperatorByCode($cod){
        return Self::where('cod',$cod)->firstOrFail()->id;
    }

    public function plan(){
        return $this->hasMany(Plan::class);
    }



}
