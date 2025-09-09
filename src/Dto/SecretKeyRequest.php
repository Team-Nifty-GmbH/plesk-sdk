<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * Secret key parameters
 */
class SecretKeyRequest extends SpatieData
{
    public function __construct(
        public ?string $ip = null,
        public ?array $ips = null,
        public ?string $login = null,
        public ?string $description = null,
    ) {}
}
