<?php

declare(strict_types=1);

namespace TeamNifty\Plesk\Enums;

enum ServerIpType: string
{
    case EXCLUSIVE = 'exclusive';
    case SHARED = 'shared';
}
