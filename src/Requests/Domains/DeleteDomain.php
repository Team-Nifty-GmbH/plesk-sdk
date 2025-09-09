<?php

namespace TeamNifty\Plesk\Requests\Domains;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\CreatedResponse;

/**
 * Delete a Domain
 */
class DeleteDomain extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param  int  $id  Domain ID
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
        return "/domains/{$this->id}";
    }
}
