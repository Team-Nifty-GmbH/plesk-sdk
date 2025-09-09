<?php

declare(strict_types=1);

namespace TeamNifty\Plesk\Enums;

enum DomainRequestHostingType: string
{
    case FRAME_FORWARDING = 'frame_forwarding';
    case NONE = 'none';
    case STANDARD_FORWARDING = 'standard_forwarding';
    case VIRTUAL = 'virtual';
}
