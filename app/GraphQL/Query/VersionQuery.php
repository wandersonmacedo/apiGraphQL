<?php

namespace App\GraphQL\Query;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;

class VersionQuery extends Query
{
    protected $attributes = [
        'name' => 'VersionQuery',
        'description' => 'Project version info',
    ];

    public function type() : Type
    {
        return GraphQL::type('version');
    }

    /**
     * @SuppressWarnings("unused")
     */
    public function resolve ($root, $args) : array
    {
        return ['version' => '1.0'];
    }
}
