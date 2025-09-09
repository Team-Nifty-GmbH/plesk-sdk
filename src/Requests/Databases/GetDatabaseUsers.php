<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get database users
 */
class GetDatabaseUsers extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  null|int  $dbId  Filter data by database ID
     */
    public function __construct(
        protected ?int $dbId = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function defaultQuery(): array
    {
        return array_filter(['dbId' => $this->dbId]);
    }

    public function resolveEndpoint(): string
    {
        return '/dbusers';
    }
}
