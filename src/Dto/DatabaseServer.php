<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DatabaseServer extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $host = null,
        public ?int $port = null,
        public ?string $type = null,
        public ?string $status = null,
        #[MapName('db_count')]
        public ?int $dbCount = null,
        #[MapName('is_default')]
        public ?bool $isDefault = null,
        #[MapName('is_local')]
        public ?bool $isLocal = null,
    ) {}
}
