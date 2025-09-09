<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * Command execution parameters
 */
class CliCallRequest extends SpatieData
{
    public function __construct(
        public ?array $params = null,
        public ?object $env = null,
    ) {}
}
