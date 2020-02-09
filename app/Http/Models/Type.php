<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'type';

    public function getType(){
        return $this->morphTo();
    }

    public function getTypeByCode($cod){
        return Self::where('cod','=',$cod)->first()->id;
    }
}
