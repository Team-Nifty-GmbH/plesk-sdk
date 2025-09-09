<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Update database user
 */
class UpdateDatabaseUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param  int  $id  Database user ID
     * @param  null|string  $login  Database user login
     * @param  null|string  $password  New user password
     */
    public function __construct(
        protected int $id,
        protected ?string $login = null,
        protected ?string $password = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter(['login' => $this->login, 'password' => $this->password]);
    }

    public function resolveEndpoint(): string
    {
        return "/dbusers/{$this->id}";
    }
}
