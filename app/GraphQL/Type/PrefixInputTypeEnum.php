<?php


namespace App\GraphQL\Type;

use GraphQL\Type\Definition\EnumType;
use Rebing\GraphQL\Support\Type as GraphQLType;


class PrefixInputTypeEnum extends GraphQLType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'PrefixInput',
        'description' => 'DDD available for selection',
        'values' => [
            "21" => 'RJ',
            "11" => 'SP' ,
            '77' => "BA",
        ],
    ];
}
