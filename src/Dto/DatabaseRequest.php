<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DatabaseRequest extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        #[MapName('parent_domain')]
        public ?DomainReference $parentDomain = null,
        #[MapName('server_id')]
        public ?int $serverId = null,
    ) {}
}
