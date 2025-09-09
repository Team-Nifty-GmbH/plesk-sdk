<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DatabaseUserRequest extends SpatieData
{
    public function __construct(
        public ?string $login = null,
        public ?string $password = null,
        #[MapName('parent_domain')]
        public ?DomainReference $parentDomain = null,
        #[MapName('server_id')]
        public ?int $serverId = null,
        #[MapName('database_id')]
        public ?int $databaseId = null,
    ) {}
}
