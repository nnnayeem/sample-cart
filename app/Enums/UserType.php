<?php
namespace App\Enums;

enum UserType:string{
    use MyEnum;
    case amn = 'admin';
    case cus = 'customer';
}
