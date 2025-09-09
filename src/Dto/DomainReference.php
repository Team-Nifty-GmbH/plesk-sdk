<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class DomainReference extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $guid = null,
    ) {}
}
