<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

/**
 * The client entity
 */
class ClientUpdateRequest extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        public ?string $company = null,
        public ?string $login = null,
        public ?int $status = null,
        public ?string $email = null,
        public ?string $locale = null,
        #[MapName('owner_login')]
        public ?string $ownerLogin = null,
        #[MapName('external_id')]
        public ?string $externalId = null,
        public ?string $description = null,
        public ?string $password = null,
    ) {}
}
