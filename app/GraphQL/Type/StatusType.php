<?php


namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StatusType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Status',
        'description' => 'A status of the creation of a plan'
    ];

    public function fields(): array
    {
        return [
            'status' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'save state',
            ],
        ];
    }
}
