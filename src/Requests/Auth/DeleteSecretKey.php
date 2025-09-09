<?php

namespace TeamNifty\Plesk\Requests\Auth;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Delete a secret key
 */
class DeleteSecretKey extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param  string  $key  Key ID
     */
    public function __construct(
        protected string $key,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/auth/keys/{$this->key}";
    }
}
