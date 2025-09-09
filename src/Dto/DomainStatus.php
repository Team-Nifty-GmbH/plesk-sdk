<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class DomainStatus extends SpatieData
{
    public function __construct(
        public ?string $status = null,
    ) {}
}
