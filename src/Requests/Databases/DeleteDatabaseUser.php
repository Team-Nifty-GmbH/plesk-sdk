<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Delete database user
 */
class DeleteDatabaseUser extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param  int  $id  Database user ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/dbusers/{$this->id}";
    }
}
