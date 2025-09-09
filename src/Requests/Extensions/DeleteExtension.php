<?php

namespace TeamNifty\Plesk\Requests\Extensions;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Delete an Extension
 */
class DeleteExtension extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param  string  $id  Extension identifier
     */
    public function __construct(
        protected string $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/extensions/{$this->id}";
    }
}
