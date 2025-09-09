<?php

namespace TeamNifty\Plesk\Requests\Server;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\ServerMeta;

/**
 * Server Meta Information
 */
class ServerMetaInformation extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return ServerMeta::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return '/server';
    }
}
