<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class FtpUserRequest extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        public ?string $password = null,
        public ?string $home = null,
        public ?int $quota = null,
        public ?object $permissions = null,
        #[MapName('parent_domain')]
        public ?DomainReference $parentDomain = null,
    ) {}
}
