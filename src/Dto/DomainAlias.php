<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

class DomainAlias extends SpatieData
{
    public function __construct(
        public ?string $name = null,
        #[MapName('ascii_name')]
        public ?string $asciiName = null,
        public ?bool $web = null,
        public ?bool $dns = null,
        public ?bool $mail = null,
        #[MapName('seo_redirect')]
        public ?bool $seoRedirect = null,
    ) {}
}
