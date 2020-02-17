<?php


namespace App\GraphQL\Query;

use App\Http\Models\Plan;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use DB;

class FindPlansQuery extends Query
{
    protected $attributes = [
        'name' => 'FindPlans',
        'description' => 'list of plans',
    ];

    public function type() : Type
    {
        return Type::listOf(GraphQL::type('planReadType'));
    }

    public function args() : array
    {
        return [
            'operator_name' => [
                'name' => 'operator_name',
                'type' => Type::string(),
                'description' => "operator name like VIVO or TIM",
            ],
            'city_code' => [
                'name' => 'city_code',
                'type' => Type::string(),
                'description' => "city code for calls like 21 for RJ or 11 for SP",
            ],
            'plan_name' => [
                'name' => 'plan_name',
                'type' => Type::string(),
                'description' => "name of a specific plan",
            ],
            'type_name' => [
                'name' => 'type_name',
                'type' => Type::string(),
                'description' => "type of plan like 'PRE' or 'POS'",
            ],

        ];
    }

    /**
     * @SuppressWarnings("unused")
     */
    public function resolve ($root, $args) : array
    {

        $plans = new Plan();
        return $plans->getAllPlanData($args);
    }
}
