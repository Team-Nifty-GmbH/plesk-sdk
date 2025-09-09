<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class ErrorResponse extends SpatieData
{
    public function __construct(
        public ?int $code = null,
        public ?string $message = null,
    ) {}
}
