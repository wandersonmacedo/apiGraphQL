<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PlanReadType extends GraphQLType
{
    protected $arrFields;

    protected $attributes = [
        'name' => 'PlanReadType',
        'description' => 'A Plan type'
    ];

    public function __construct()
    {
        $this->arrFields = [
            'plan_name' => [
                'type' => Type::string(),
                'description' => 'Plan Name',
            ],
            'minute_amount' => [
                'type' => Type::string(),
                'description' => 'amount of minutes available to make calls',
            ],
            'internet_amount' => [
                'type' => Type::string(),
                'description' => 'Amount of internet available on this plan',
            ],
            'price' => [
                'type' => Type::float(),
                'description' => 'plan price',
            ],
            'operator_name' => [
                'type' => Type::string(),
                'description' => 'company that is selling the plan',
            ],
            'type_name' => [
                'type' => Type::string(),
                'description' => 'type of the plan',
            ],
            'country' => [
                'type' => Type::string(),
                'description' => 'country info',
            ],
            'country_code' => [
                'type' => Type::string(),
                'description' => 'country code',
            ],
            'city' => [
                'type' => Type::string(),
                'description' => 'city info',
            ],
            'city_code' => [
                'type' => Type::string(),
                'description' => 'city code',
            ],
        ];
    }

    public function fields(): array
    {
        return $this->arrFields;
    }


}
