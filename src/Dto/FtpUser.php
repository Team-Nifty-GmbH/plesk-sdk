<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class FtpUser extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $home = null,
        public ?int $quota = null,
        public ?object $permissions = null,
        #[MapName('parent_domain')]
        public ?int $parentDomain = null,
    ) {}
}
