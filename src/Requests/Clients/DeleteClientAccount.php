<?php

namespace TeamNifty\Plesk\Requests\Clients;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\CreatedResponse;

/**
 * Delete client account
 */
class DeleteClientAccount extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param  int  $id  Client ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return CreatedResponse::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/clients/{$this->id}";
    }
}
