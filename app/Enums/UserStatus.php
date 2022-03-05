<?php
namespace App\Enums;

enum UserStatus:string{
    use MyEnum;
    case actv = 'active';
    case iactv = 'inactive';
    case bnnd = 'banned';
}
