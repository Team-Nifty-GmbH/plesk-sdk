<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

/**
 * Plesk administrator information
 */
class Admin extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        public ?string $email = null,
        public ?string $company = null,
        public ?string $phone = null,
        public ?string $fax = null,
        public ?string $address = null,
        public ?string $city = null,
        public ?string $state = null,
        #[MapName('post_code')]
        public ?string $postCode = null,
        public ?string $country = null,
        #[MapName('send_announce')]
        public ?bool $sendAnnounce = null,
        public ?string $locale = null,
        #[MapName('multiple_sessions')]
        public ?bool $multipleSessions = null,
    ) {}
}
