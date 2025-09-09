<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * Extension entity
 */
class Extension extends SpatieData
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $version = null,
        public ?string $release = null,
        public ?bool $active = null,
    ) {}
}
