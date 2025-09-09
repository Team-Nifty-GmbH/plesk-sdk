<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * Server IP Addresses
 */
class ServerIp extends SpatieData
{
    public function __construct(
        public ?string $ipv4 = null,
        public ?string $ipv6 = null,
        public ?string $netmask = null,
        public ?string $interface = null,
        public ?string $type = null,
    ) {}
}
