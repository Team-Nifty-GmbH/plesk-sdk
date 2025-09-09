<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class CreatedResponse extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $guid = null,
    ) {}
}
