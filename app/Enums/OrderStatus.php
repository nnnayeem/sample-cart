<?php

namespace App\Enums;

enum OrderStatus:string{
    use MyEnum;
    case pending = 'pending';
    case accepted = 'accepted';
    case delivering = 'delivering';
    case delivered = 'delivered';
    case cancelled = 'cancelled';
}
