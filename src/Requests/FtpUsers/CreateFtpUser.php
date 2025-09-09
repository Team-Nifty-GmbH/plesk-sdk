<?php

namespace TeamNifty\Plesk\Requests\FtpUsers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\FtpUser;

/**
 * Create FTP user
 */
class CreateFtpUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  string  $name  User name in the system
     * @param  string  $password  User password
     * @param  null|string  $home  Subdirectory of the WWW Root that user is restricted to
     * @param  null|int  $quota  Hard disk quota in bytes (if supported by platform)
     * @param  null|array  $permissions  Access permissions of the user (if supported by platform)
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     */
    public function __construct(
        protected string $name,
        protected string $password,
        protected ?string $home = null,
        protected ?int $quota = null,
        protected ?array $permissions = null,
        protected ?int $parentDomainId = null,
        protected ?string $parentDomainName = null,
        protected ?string $parentDomainGuid = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return FtpUser::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'password' => $this->password,
            'home' => $this->home,
            'quota' => $this->quota,
            'permissions' => $this->permissions,
            'parent_domain' => array_filter(['id' => $this->parentDomainId, 'name' => $this->parentDomainName, 'guid' => $this->parentDomainGuid]),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/ftpusers';
    }
}
