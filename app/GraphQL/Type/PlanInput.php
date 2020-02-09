<?php


namespace App\GraphQL\Type;


use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\InputType;
use Tymon\JWTAuth\Facades\JWTAuth;

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
                'type' => Type::nonNull(Type::float()),
                'description' => 'discount percentage',
            ],
            'internet_amount' => [
                'type' => Type::float(),
                'description' => 'Max value permited',
                'rules' => ['nullable']
            ],
            'price' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'if the coupon is acumulative',
            ],
            'beginDate' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'day that the coupon begin to be valid',
            ],
            'endDate' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'date that the coupon expire',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'description of the coupon',
                'rules' => ['nullable']
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('productInput')),
                'description' => 'The project current version',
                'rules' => ['nullable']
            ],
            'industry' => [
                'type' => Type::nonNull(Type::string()),
            ]
        ];
        $user = JWTAuth::parseToken()->authenticate();
        if ($user->level != 'master') {
            unset($this->arrFields['industry']);
        }
    }

    public function fields(): array
    {
        return $this->arrFields;
    }
}

}
