<?php

namespace TeamNifty\Plesk\Requests\FtpUsers;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Delete FTP user
 */
class DeleteFtpUser extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param  string  $name  FTP User name
     */
    public function __construct(
        protected string $name,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/ftpusers/{$this->name}";
    }
}
