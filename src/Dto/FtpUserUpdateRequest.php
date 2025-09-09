<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class FtpUserUpdateRequest extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        public ?string $password = null,
        public ?string $home = null,
        public ?int $quota = null,
        public ?object $permissions = null,
    ) {}
}
