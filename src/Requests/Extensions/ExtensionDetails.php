<?php

namespace TeamNifty\Plesk\Requests\Extensions;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\Extension;

/**
 * Extension details
 */
class ExtensionDetails extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $id  Extension identifier
     */
    public function __construct(
        protected string $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return Extension::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/extensions/{$this->id}";
    }
}
