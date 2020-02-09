<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';
    protected $fillable = [
        'plan_name',
        'minute_amount',
        'internet_amount',
        'price',
        'type_id',
        'operator_id',
        'available_location'
    ];


    public function avaiablePlans(){
        return $this->morphTo();
    }

    public function getPlanType(){
        $this->morphOne('App\Http\Models\Type','getType');
    }

    public function saveNewPlan($args){
        $args = $args["plan"];
        $type = new Type();
        $operator = new Operator();
        $this->fill([
            "plan_name" => $args["plan_name"],
            "minute_amount" => $args["minute_amount"],
            "internet_amount" => $args["internet_amount"],
            "price" => $args["price"],
            "type_id" => $type->getTypeByCode($args["plan_type"]),
            "operator_id" => $operator->getTypeByCode($args["operating_company"]),
            "available_location" => $args["available_location"]

        ]);
        if($this->save()){
            return ["status" => "Plano ".$args["plan_name"]." salvo com sucesso"];
        }

        return ["status" => "Plano ".$args["plan_name"]." não foi salvo"];
    }
}
