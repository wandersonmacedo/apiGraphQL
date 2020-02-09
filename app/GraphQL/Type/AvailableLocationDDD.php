<?php


namespace App\GraphQL\Type;


use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AvailableLocationDDD extends GraphQLType
{
    protected $attributes = [
        'name' => 'available DDDs',
        'description' => 'A status of the creation of a plan'
    ];

    public function fields(): array
    {
        return [
            'coutry' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'save state',
            ],
            'country_code' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'save state',
            ],
            'city' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'save state',
            ],
            'city_code' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'save state',
            ],
        ];
    }

}
