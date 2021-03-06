<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPrefixAvailable extends Model
{
    protected $table = 'plan_prefix_available';

    protected $fillable = ['plan_id','prefix_id'];



    public function plan(){
        $this->belongsTo(Plan::class);
    }

    public function prefix(){
        $this->belongsTo(Prefix::class);
    }
}
