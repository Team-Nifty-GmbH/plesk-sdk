<?php

namespace TeamNifty\Plesk\Requests\FtpUsers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Update FTP user
 */
class UpdateFtpUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param  string  $name  FTP user name
     * @param  null|string  $name  User name in the system
     * @param  null|string  $password  User password
     * @param  null|string  $home  Subdirectory of the WWW Root that user is restricted to
     * @param  null|int  $quota  Hard disk quota in bytes (if supported by platform)
     * @param  null|array  $permissions  Access permissions of the user (if supported by platform)
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $password = null,
        protected ?string $home = null,
        protected ?int $quota = null,
        protected ?array $permissions = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'password' => $this->password,
            'home' => $this->home,
            'quota' => $this->quota,
            'permissions' => $this->permissions,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return "/ftpusers/{$this->name}";
    }
}
