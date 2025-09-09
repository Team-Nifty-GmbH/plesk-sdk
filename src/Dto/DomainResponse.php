<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DomainResponse extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        #[MapName('ascii_name')]
        public ?string $asciiName = null,
        #[MapName('hosting_type')]
        public ?string $hostingType = null,
        #[MapName('base_domain_id')]
        public ?int $baseDomainId = null,
        #[MapName('www_root')]
        public ?string $wwwRoot = null,
        public ?string $guid = null,
        public ?string $created = null,
        public ?array $aliases = null,
    ) {}
}
