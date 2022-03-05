<?php

namespace App\Enums;

enum ProductStatus:string{
    case os = 'out_of_stock';
    case is = 'in_stock';
}
