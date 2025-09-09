<?php

namespace TeamNifty\Plesk\Requests\Domains;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * List all domains
 */
class ListAllDomains extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  null|string  $name  Filter data by domain name
     */
    public function __construct(
        protected ?string $name = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function defaultQuery(): array
    {
        return array_filter(['name' => $this->name]);
    }

    public function resolveEndpoint(): string
    {
        return '/domains';
    }
}
