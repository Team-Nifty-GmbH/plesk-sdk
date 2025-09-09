<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class DatabaseUserUpdateRequest extends SpatieData
{
    public function __construct(
        public ?string $login = null,
        public ?string $password = null,
    ) {}
}
