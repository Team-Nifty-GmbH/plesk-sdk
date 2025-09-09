<?php

namespace TeamNifty\Plesk\Requests\Clients;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\Client;

/**
 * Client details
 */
class ClientDetails extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  int  $id  Client ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return Client::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/clients/{$this->id}";
    }
}
