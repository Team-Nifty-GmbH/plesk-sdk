<?php

namespace TeamNifty\Plesk\Requests\Databases;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\Database;
use TeamNifty\Plesk\Enums\DatabaseType;

/**
 * Create database
 */
class CreateDatabase extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|string  $name  Database name
     * @param  null|DatabaseType  $type  Database server type
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     * @param  null|int  $serverId  ID of the database server
     */
    public function __construct(
        protected ?string $name = null,
        protected ?DatabaseType $type = null,
        protected ?int $parentDomainId = null,
        protected ?string $parentDomainName = null,
        protected ?string $parentDomainGuid = null,
        protected ?int $serverId = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return Database::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type?->value,
            'server_id' => $this->serverId,
            'parent_domain' => array_filter(['id' => $this->parentDomainId, 'name' => $this->parentDomainName, 'guid' => $this->parentDomainGuid]),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/databases';
    }
}
