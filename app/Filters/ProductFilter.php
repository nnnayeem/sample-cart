<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function id(Builder $builder, string $value)
    {
        if(!empty($value)) {
            $builder->where('id', $value);
        }
    }

    public function name(Builder $builder, string $value)
    {
        if(!empty($value)) {
            $builder->where('name', "LIKE", "%$value%");
        }
    }

    public function min(Builder $builder, string $value)
    {
        if(!empty($value)) {
            $builder->where('price', '>=', $value);
        }
    }

    public function max(Builder $builder, string $value)
    {
        if(!empty($value)) {
            $builder->where('price', '<=', $value);
        }
    }
}
