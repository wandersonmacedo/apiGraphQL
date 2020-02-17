<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'type';

    public function plan(){
        return $this->hasMany(Plan::class);
    }

    public function getTypeByCode($cod){
        return Self::where('cod','=',$cod)->first()->id;
    }
}
