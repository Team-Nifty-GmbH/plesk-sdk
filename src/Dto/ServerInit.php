<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

/**
 * Initial server setup parameters
 */
class ServerInit extends SpatieData
{
    public function __construct(
        public ?Admin $admin = null,
        public ?string $password = null,
        #[MapName('server_name')]
        public ?string $serverName = null,
    ) {}
}
