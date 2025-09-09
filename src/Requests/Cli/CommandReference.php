<?php

namespace TeamNifty\Plesk\Requests\Cli;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Command reference
 *
 * plesk: >= 17.9
 */
class CommandReference extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $id  Command identifier
     */
    public function __construct(
        protected string $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function resolveEndpoint(): string
    {
        return "/cli/{$this->id}/ref";
    }
}
