<?php

declare(strict_types=1);

namespace TeamNifty\Plesk\Enums;

enum DomainStatusStatus: string
{
    case ACTIVE = 'active';
    case DISABLED = 'disabled';
    case SUSPENDED = 'suspended';
}
