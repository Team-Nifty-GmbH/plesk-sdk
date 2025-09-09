<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DomainRequest extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        #[MapName('hosting_type')]
        public ?string $hostingType = null,
        #[MapName('hosting_settings')]
        public ?object $hostingSettings = null,
        #[MapName('base_domain')]
        public ?DomainReference $baseDomain = null,
        #[MapName('parent_domain')]
        public ?DomainReference $parentDomain = null,
        #[MapName('owner_client')]
        public ?OwnerClientReference $ownerClient = null,
        #[MapName('ip_addresses')]
        public ?array $ipAddresses = null,
        public ?array $ipv4 = null,
        public ?array $ipv6 = null,
        public ?PlanReference $plan = null,
    ) {}
}
