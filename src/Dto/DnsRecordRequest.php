<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

class DnsRecordRequest extends SpatieData
{
    public function __construct(
        public ?string $type = null,
        public ?string $host = null,
        public ?string $value = null,
        public ?string $opt = null,
        public ?int $ttl = null,
    ) {}
}
