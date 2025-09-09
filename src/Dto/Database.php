<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class Database extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $type = null,
        #[MapName('parent_domain')]
        public ?int $parentDomain = null,
        #[MapName('server_id')]
        public ?int $serverId = null,
        #[MapName('default_user_id')]
        public ?int $defaultUserId = null,
    ) {}
}
