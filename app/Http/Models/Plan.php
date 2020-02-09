<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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
    ];


    public function Operator(){
        return $this->hasOne('App\Http\Models\Operator');
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
            "operator_id" => $operator->getOperatorByCode($args["operating_company"]),
        ]);
        if($this->save()){
            PlanPrefixAvailable::create(["plan_id" => $this->id,"prefix_id" => Prefix::where('city',$args["available_location"])->firstOrFail()->id]);
            return ["status" => "Plano ".$args["plan_name"]." salvo com sucesso"];
        }

        return ["status" => "Plano ".$args["plan_name"]." não foi salvo"];
    }

    public function getAllPlanData(){
            return DB::table('plan')
            ->join('operator', 'plan.operator_id', '=', 'operator.id')
            ->join('type', 'plan.type_id', '=', 'type.id')
            ->join('plan_prefix_available', 'plan.id', '=', 'plan_prefix_available.plan_id')
            ->join('prefix', 'plan_prefix_available.prefix_id', '=', 'prefix.id')
            ->select('plan.*', 'operator.name as operator_name', 'type.name as type_name', 'prefix.*')
            ->get()->toArray();
    }


}



