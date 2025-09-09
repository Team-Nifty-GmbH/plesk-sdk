<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

/**
 * Server Meta Information
 */
class ServerMeta extends SpatieData
{
    public function __construct(
        public ?string $platform = null,
        public ?string $hostname = null,
        public ?string $guid = null,
        #[MapName('panel_version')]
        public ?string $panelVersion = null,
        #[MapName('panel_revision')]
        public ?string $panelRevision = null,
        #[MapName('panel_build_date')]
        public ?string $panelBuildDate = null,
        #[MapName('panel_update_version')]
        public ?string $panelUpdateVersion = null,
        #[MapName('extension_version')]
        public ?string $extensionVersion = null,
        #[MapName('extension_release')]
        public ?string $extensionRelease = null,
    ) {}
}
