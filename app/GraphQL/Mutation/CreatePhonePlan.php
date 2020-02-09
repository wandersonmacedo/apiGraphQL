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

        ];
    }
    public function resolve($root, $args) : array
    {
        $plan = new Plan();

        $plan->saveNewPlan($args);
        return ['status' => json_encode($args)];
    }
}
