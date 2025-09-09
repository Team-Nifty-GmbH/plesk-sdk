<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get database servers
 */
class GetDatabaseServers extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  null|int  $id  Filter data by database server id
     */
    public function __construct(
        protected ?int $id = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }

    public function resolveEndpoint(): string
    {
        return '/dbservers';
    }
}
