<?php

namespace TeamNifty\Plesk\Requests\Dns;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get domain or domain alias DNS records
 */
class GetDomainOrDomainAliasDnsRecords extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $domain  Filter by domain or domain alias name
     */
    public function __construct(
        protected string $domain,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function defaultQuery(): array
    {
        return array_filter(['domain' => $this->domain]);
    }

    public function resolveEndpoint(): string
    {
        return '/dns/records';
    }
}
