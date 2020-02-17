<?php
namespace App\GraphQL\Mutation;

use App\Http\Models\Plan;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreatePhonePlan extends Mutation
{

    public function type() : Type
    {
        return GraphQL::type('status');
    }

    public function args() : array
    {
        return [
            'plan' => [
                'name' => 'plan',
                'type' => Type::nonNull(GraphQL::type('planInput')),
                'description' => "its a plan making mutation",
            ],
            'plan_id' => [
                'name' => 'plan_id',
                'type' => Type::int(),
                'description' => "if you wanna edit a specific plan just put thee plan id here and fill the fields",
            ],

        ];
    }
    public function resolve($root, $args) : array
    {
        $plan = new Plan();
        return $plan->saveNewPlan($args);
    }
}
