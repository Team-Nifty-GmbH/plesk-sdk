<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class SecretKeyResponse extends SpatieData
{
    public function __construct(
        public ?string $key = null,
    ) {}
}
