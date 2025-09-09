<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * License parameters
 */
class ServerLicense extends SpatieData
{
    public function __construct(
        public ?string $key = null,
        public ?string $code = null,
        public ?bool $additional = null,
    ) {}
}
