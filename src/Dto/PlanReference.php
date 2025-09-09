<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class PlanReference extends SpatieData
{
    public function __construct(
        public ?string $name = null,
    ) {}
}
