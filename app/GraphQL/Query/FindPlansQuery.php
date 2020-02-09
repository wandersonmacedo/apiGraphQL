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

    /**
     * @SuppressWarnings("unused")
     */
    public function resolve ($root, $args) : array
    {

        $plans = new Plan();
        return $plans->getAllPlanData();
    }
}
