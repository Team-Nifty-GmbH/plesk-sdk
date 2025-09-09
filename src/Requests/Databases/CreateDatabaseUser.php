<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\DatabaseUser;

/**
 * Create database user
 */
class CreateDatabaseUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|string  $login  Database user login
     * @param  null|string  $password  User password
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     * @param  null|int  $serverId  ID of the database server (if user should have access to all databases on subscription)
     * @param  null|int  $databaseId  ID of the database (if user should have access to one database)
     */
    public function __construct(
        protected ?string $login = null,
        protected ?string $password = null,
        protected ?int $parentDomainId = null,
        protected ?string $parentDomainName = null,
        protected ?string $parentDomainGuid = null,
        protected ?int $serverId = null,
        protected ?int $databaseId = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return DatabaseUser::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'login' => $this->login,
            'password' => $this->password,
            'server_id' => $this->serverId,
            'database_id' => $this->databaseId,
            'parent_domain' => array_filter(['id' => $this->parentDomainId, 'name' => $this->parentDomainName, 'guid' => $this->parentDomainGuid]),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/dbusers';
    }
}
