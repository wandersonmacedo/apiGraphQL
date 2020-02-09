<?php

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreatePhonePlan extends Mutation
{

    public function type() : Type
    {
        return Type::listOf(GraphQL::type('status'));
    }

    public function args() : array
    {
        return [
            'plan' => [
                'name' => 'plan',
                'type' => Type::nonNull(Type::listOf(GraphQL::type('planInput'))),
                'description' => "its a plan making mutation",
            ],

        ];
    }
    public function resolve($root, $args) : array
    {

    }
}
