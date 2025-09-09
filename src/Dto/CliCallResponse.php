<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * Command execution result
 */
class CliCallResponse extends SpatieData
{
    public function __construct(
        public ?int $code = null,
        public ?string $stdout = null,
        public ?string $stderr = null,
    ) {}
}
