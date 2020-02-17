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


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function planPrefix()
    {
        return $this->hasMany(PlanPrefixAvailable::class);
    }


    public function saveNewPlan($args)
    {

        $type = new Type();
        $operator = new Operator();
        if(!empty($args["plan_id"])){
            $editPlan = Plan::findOrFail($args["plan_id"]);

            $editPlan->fill([
                "plan_name" => $args["plan"]["plan_name"],
                "minute_amount" => $args["plan"]["minute_amount"],
                "internet_amount" => $args["plan"]["internet_amount"],
                "price" => $args["plan"]["price"],
                "type_id" => $type->getTypeByCode($args["plan"]["plan_type"]),
                "operator_id" => $operator->getOperatorByCode($args["plan"]["operating_company"]),
            ]);
            if($editPlan->update()){
                PlanPrefixAvailable::create(["plan_id" => $editPlan->id,"prefix_id" => Prefix::where('city',$args["plan"]["available_location"])->firstOrFail()->id]);
                return ["status" => "Plano ".$args["plan"]["plan_name"]." salvo com sucesso"];
            }
        }else{
            $args = $args["plan"];

            $this->fill([
            "plan_name" => $args["plan_name"],
            "minute_amount" => $args["minute_amount"],
            "internet_amount" => $args["internet_amount"],
            "price" => $args["price"],
            "type_id" => $type->getTypeByCode($args["plan_type"]),
            "operator_id" => $operator->getOperatorByCode($args["operating_company"]),
        ]);
            if($this->save())
            {
                PlanPrefixAvailable::create(["plan_id" => $this->id,"prefix_id" => Prefix::where('city',$args["available_location"])->firstOrFail()->id]);
                return ["status" => "Plano ".$args["plan_name"]." salvo com sucesso"];
            }
        }

        return ["status" => "Plano ".$args["plan_name"]." não foi salvo"];
    }

    public function getAllPlanData($args)
    {

        $op = Operator::all();
        $filterResult = [];
        foreach ($op as $operator) {
            $test = Operator::find(3);

            $resultAllData = $test->plan()->with('operator')->join('type', 'plan.type_id', '=', 'type.id')
                ->join('plan_prefix_available', 'plan.id', '=', 'plan_prefix_available.plan_id')
                ->join('prefix', 'plan_prefix_available.prefix_id', '=', 'prefix.id');

            if(!empty($args["plan_name"])){
                $resultAllData->where('plan.plan_name', '=',$args["plan_name"]);
            }
            if(!empty($args["city_code"])){
                $resultAllData->where('prefix.city_code', '=',$args["city_code"]);
            }
            if(!empty($args["operator_name"])){
                $resultAllData->where('operator.name', '=',$args["operator_name"]);
            }
            if(!empty($args["type_name"])){
                $resultAllData->where('type.name', '=',$args["type_name"]);
            }

            foreach($resultAllData->get(['plan.*','type.*', 'prefix.*','type.name as type_name','plan.id as plan_id'])->toArray() as $r){
                $r["operator_name"] = $r["operator"]["name"];
                $filterResult[] = $r;
            }
        }
        return $filterResult;

    }


}



