<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class DnsRecord extends SpatieData
{
    public function __construct(
        public ?int $id = null,
        public ?string $type = null,
        public ?string $host = null,
        public ?string $value = null,
        public ?string $opt = null,
        public ?int $ttl = null,
    ) {}
}
