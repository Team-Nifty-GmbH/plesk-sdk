<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Requests\FtpUsers\CreateFtpUser;
use TeamNifty\Plesk\Requests\FtpUsers\DeleteFtpUser;
use TeamNifty\Plesk\Requests\FtpUsers\GetFtpUsers;
use TeamNifty\Plesk\Requests\FtpUsers\UpdateFtpUser;

class FtpUsers extends BaseResource
{
    /**
     * @param  string  $name  User name in the system
     * @param  string  $password  User password
     * @param  null|string  $home  Subdirectory of the WWW Root that user is restricted to
     * @param  null|int  $quota  Hard disk quota in bytes (if supported by platform)
     * @param  null|array  $permissions  Access permissions of the user (if supported by platform)
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createFtpUser(
        string $name,
        string $password,
        ?string $home = null,
        ?int $quota = null,
        ?array $permissions = null,
        ?int $parentDomainId = null,
        ?string $parentDomainName = null,
        ?string $parentDomainGuid = null,
    ): Response {
        return $this->connector->send(new CreateFtpUser($name, $password, $home, $quota, $permissions, $parentDomainId, $parentDomainName, $parentDomainGuid));
    }

    /**
     * @param  string  $name  FTP User name
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteFtpUser(string $name): Response
    {
        return $this->connector->send(new DeleteFtpUser($name));
    }

    /**
     * @param  null|string  $name  Filter data by user name
     * @param  null|string  $domain  Filter data by domain name
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFtpUsers(?string $name = null, ?string $domain = null): Response
    {
        return $this->connector->send(new GetFtpUsers($name, $domain));
    }

    /**
     * @param  string  $name  FTP user name
     * @param  null|string  $name  User name in the system
     * @param  null|string  $password  User password
     * @param  null|string  $home  Subdirectory of the WWW Root that user is restricted to
     * @param  null|int  $quota  Hard disk quota in bytes (if supported by platform)
     * @param  null|array  $permissions  Access permissions of the user (if supported by platform)
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateFtpUser(
        ?string $name = null,
        ?string $password = null,
        ?string $home = null,
        ?int $quota = null,
        ?array $permissions = null,
    ): Response {
        return $this->connector->send(new UpdateFtpUser($name, $name, $password, $home, $quota, $permissions));
    }
}
