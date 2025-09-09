<?php

namespace TeamNifty\Plesk\Requests\Server;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Server IP Addresses
 */
class ServerIpAddresses extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function resolveEndpoint(): string
    {
        return '/server/ips';
    }
}
