<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class OwnerClientReference extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $login = null,
        public ?string $guid = null,
        #[MapName('external_id')]
        public ?string $externalId = null,
    ) {}
}
