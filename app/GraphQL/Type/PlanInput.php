<?php


namespace App\GraphQL\Type;


use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\InputType;

class PlanInput extends InputType
{
    protected $inputObject = true;
    protected $arrFields;

    protected $attributes = [
        'name' => 'PlanInput',
        'description' => 'A Plan input type'
    ];

    public function __construct()
    {
        $this->arrFields = [
            'plan_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Plan Name',
            ],
            'minute_amount' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'amount of minutes available to make calls',
            ],
            'internet_amount' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Amount of internet available on this plan',
            ],
            'price' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'plan price',
            ],
            'operating_company' => [
                'type' => Type::nonNull(GraphQL::type('operatorCompanies')),
                'description' => 'company that is selling the plan',
            ],
            'plan_type' => [
                'type' => Type::nonNull(GraphQL::type('planInputType')),
                'description' => 'type of the plan',
            ],
            'available_location' => [
                'type' => Type::nonNull(GraphQL::type('DDD')),
                'description' => "available ddd's for plans",
            ]
        ];
    }

    public function fields(): array
    {
        return $this->arrFields;
    }


}
