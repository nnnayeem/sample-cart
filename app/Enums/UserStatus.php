<?php
namespace App\Enums;

enum UserStatus:string{
    case actv = 'active';
    case iactv = 'inactive';
    case bnnd = 'banned';
}
