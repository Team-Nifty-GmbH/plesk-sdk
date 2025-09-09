<?php

namespace TeamNifty\Plesk\Requests\Clients;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * List all clients
 */
class ListAllClients extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function resolveEndpoint(): string
    {
        return '/clients';
    }
}
