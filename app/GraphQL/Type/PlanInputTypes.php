<?php


namespace App\GraphQL\Type;

use GraphQL\Type\Definition\EnumType;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PlanInputTypes extends GraphQLType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'PlanInputTypes',
        'description' => 'Types of plans to choose',
        'values' => [
            'PRE' ,
            'CONTROLE',
            'POS'
        ],
    ];

}
