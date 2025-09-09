<?php

namespace TeamNifty\Plesk\Requests\Dns;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\DnsRecord;

/**
 * Get DNS record
 */
class GetDnsRecord extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  int  $id  DNS record ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return DnsRecord::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/dns/records/{$this->id}";
    }
}
