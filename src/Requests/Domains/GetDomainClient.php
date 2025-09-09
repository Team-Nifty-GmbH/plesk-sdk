<?php

namespace TeamNifty\Plesk\Requests\Domains;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\Client;

/**
 * Get domain client
 */
class GetDomainClient extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  int  $id  Domain ID
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
        return "/domains/{$this->id}/client";
    }
}
