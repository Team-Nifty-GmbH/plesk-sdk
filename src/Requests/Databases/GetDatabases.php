<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get databases
 */
class GetDatabases extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  null|string  $domain  Filter data by domain name
     */
    public function __construct(
        protected ?string $domain = null,
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
        return '/databases';
    }
}
