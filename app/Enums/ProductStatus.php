<?php

namespace App\Enums;

enum ProductStatus:string{
    use MyEnum;
    case os = 'out_of_stock';
    case is = 'in_stock';
}
