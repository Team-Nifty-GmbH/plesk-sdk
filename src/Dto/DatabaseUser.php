<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DatabaseUser extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $login = null,
        #[MapName('database_id')]
        public ?int $databaseId = null,
    ) {}
}
