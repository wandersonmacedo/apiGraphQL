<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    //
    protected $table = 'prefix';


    public function planPrefix()
    {
        return $this->hasMany(PlanPrefixAvailable::class);
    }
}
