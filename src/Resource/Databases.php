<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Enums\DatabaseType;
use TeamNifty\Plesk\Requests\Databases\CreateDatabase;
use TeamNifty\Plesk\Requests\Databases\CreateDatabaseUser;
use TeamNifty\Plesk\Requests\Databases\DeleteDatabase;
use TeamNifty\Plesk\Requests\Databases\DeleteDatabaseUser;
use TeamNifty\Plesk\Requests\Databases\GetDatabases;
use TeamNifty\Plesk\Requests\Databases\GetDatabaseServers;
use TeamNifty\Plesk\Requests\Databases\GetDatabaseUsers;
use TeamNifty\Plesk\Requests\Databases\UpdateDatabaseUser;

class Databases extends BaseResource
{
    /**
     * @param  null|string  $name  Database name
     * @param  null|DatabaseType  $type  Database server type
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     * @param  null|int  $serverId  ID of the database server
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createDatabase(
        ?string $name = null,
        ?DatabaseType $type = null,
        ?int $parentDomainId = null,
        ?string $parentDomainName = null,
        ?string $parentDomainGuid = null,
        ?int $serverId = null,
    ): Response {
        return $this->connector->send(new CreateDatabase($name, $type, $parentDomainId, $parentDomainName, $parentDomainGuid, $serverId));
    }

    /**
     * @param  null|string  $login  Database user login
     * @param  null|string  $password  User password
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     * @param  null|int  $serverId  ID of the database server (if user should have access to all databases on subscription)
     * @param  null|int  $databaseId  ID of the database (if user should have access to one database)
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createDatabaseUser(
        ?string $login = null,
        ?string $password = null,
        ?int $parentDomainId = null,
        ?string $parentDomainName = null,
        ?string $parentDomainGuid = null,
        ?int $serverId = null,
        ?int $databaseId = null,
    ): Response {
        return $this->connector->send(new CreateDatabaseUser($login, $password, $parentDomainId, $parentDomainName, $parentDomainGuid, $serverId, $databaseId));
    }

    /**
     * @param  int  $id  Database ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteDatabase(int $id): Response
    {
        return $this->connector->send(new DeleteDatabase($id));
    }

    /**
     * @param  int  $id  Database user ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteDatabaseUser(int $id): Response
    {
        return $this->connector->send(new DeleteDatabaseUser($id));
    }

    /**
     * @param  null|string  $domain  Filter data by domain name
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDatabases(?string $domain = null): Response
    {
        return $this->connector->send(new GetDatabases($domain));
    }

    /**
     * @param  null|int  $id  Filter data by database server id
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDatabaseServers(?int $id = null): Response
    {
        return $this->connector->send(new GetDatabaseServers($id));
    }

    /**
     * @param  null|int  $dbId  Filter data by database ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDatabaseUsers(?int $dbId = null): Response
    {
        return $this->connector->send(new GetDatabaseUsers($dbId));
    }

    /**
     * @param  int  $id  Database user ID
     * @param  null|string  $login  Database user login
     * @param  null|string  $password  New user password
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateDatabaseUser(int $id, ?string $login = null, ?string $password = null): Response
    {
        return $this->connector->send(new UpdateDatabaseUser($id, $login, $password));
    }
}
