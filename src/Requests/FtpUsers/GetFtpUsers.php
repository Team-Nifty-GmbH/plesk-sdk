<?php

namespace TeamNifty\Plesk\Requests\FtpUsers;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get FTP users
 */
class GetFtpUsers extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  null|string  $name  Filter data by user name
     * @param  null|string  $domain  Filter data by domain name
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $domain = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }

    public function defaultQuery(): array
    {
        return array_filter(['name' => $this->name, 'domain' => $this->domain]);
    }

    public function resolveEndpoint(): string
    {
        return '/ftpusers';
    }
}
