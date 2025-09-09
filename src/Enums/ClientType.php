<?php

declare(strict_types=1);

namespace TeamNifty\Plesk\Enums;

enum ClientType: string
{
    case ADMIN = 'admin';
    case CUSTOMER = 'customer';
    case RESELLER = 'reseller';
}
