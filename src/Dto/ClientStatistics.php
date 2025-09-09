<?php

namespace TeamNifty\Plesk\Dto;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data as SpatieData;

/**
 * The client statistics
 */
class ClientStatistics extends SpatieData
{
    public function __construct(
        #[MapName('active_domains')]
        public ?int $activeDomains = null,
        public ?int $subdomains = null,
        #[MapName('disk_space')]
        public ?int $diskSpace = null,
        #[MapName('email_postboxes')]
        public ?int $emailPostboxes = null,
        #[MapName('email_redirects')]
        public ?int $emailRedirects = null,
        #[MapName('email_response_messages')]
        public ?int $emailResponseMessages = null,
        #[MapName('mailing_lists')]
        public ?int $mailingLists = null,
        public ?int $databases = null,
        public ?int $traffic = null,
        #[MapName('traffic_prevday')]
        public ?int $trafficPrevday = null,
    ) {}
}
