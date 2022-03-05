<?php

namespace App\Enums;

enum OrderStatus:string{
    case pending = 'pending';
    case accepted = 'accepted';
    case delivering = 'delivering';
    case delivered = 'delivered';
}
