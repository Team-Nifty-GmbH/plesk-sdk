<?php

namespace TeamNifty\Plesk\Requests\Cli;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * List of available commands
 */
class ListOfAvailableCommands extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function resolveEndpoint(): string
    {
        return '/cli/commands';
    }
}
