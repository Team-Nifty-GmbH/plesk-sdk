<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Data as SpatieData;

/**
 * Extension installation request
 */
class ExtensionInstallRequest extends SpatieData
{
    public function __construct(
        public ?string $id = null,
        public ?string $url = null,
        public ?string $file = null,
    ) {}
}
