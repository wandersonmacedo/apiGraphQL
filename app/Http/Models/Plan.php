<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    public function avaiablePlans(){
        return $this->morphTo();
    }

    public function getPlanType(){
        $this->morphOne('App\Http\Models\Type','getType');
    }
}
