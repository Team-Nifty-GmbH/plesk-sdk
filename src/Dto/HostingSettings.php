<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

/**
 * for *physical hosting*:
 * `ftp_login` - it specifies the ftp user login name (required).
 * `ftp_password` - it specifies the ftp user password (required).
 * for *frame forwarding* and *standard
 * forwarding*:
 * `dest_url` - it specifies the URL to which the user will be redirected explicitly at
 * the attempt to visit the specified domain.
 */
class HostingSettings extends SpatieData
{
    public function __construct(
        #[MapName('ftp_login')]
        public ?string $ftpLogin = null,
        #[MapName('ftp_password')]
        public ?string $ftpPassword = null,
    ) {}
}
