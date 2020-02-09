<?php


namespace App\GraphQL\Type;


use Rebing\GraphQL\Support\Type as GraphQLType;

class OperatorCompanies extends GraphQLType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'OperatorCompany',
        'description' => 'Operator companies avaiable',
        'values' => [
            'VIVO' => 'VIVO',
            'TIM' => 'TIM',
            'CLARO' => 'CLARO',
            'NEXTEL' => 'NEXTEL',
            'OI' => 'OI',
        ],
    ];
}
