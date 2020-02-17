<?php


namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OperatorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Operator',
        'description' => 'Operaor info'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::string(),
                'description' => 'operator id',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'operator name',
            ],
        ];
    }
}
