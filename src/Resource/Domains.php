<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Enums\DomainRequestHostingType;
use TeamNifty\Plesk\Enums\DomainStatusStatus;
use TeamNifty\Plesk\Requests\Domains\CreateNewDomain;
use TeamNifty\Plesk\Requests\Domains\DeleteDomain;
use TeamNifty\Plesk\Requests\Domains\DomainDetails;
use TeamNifty\Plesk\Requests\Domains\GetDomainClient;
use TeamNifty\Plesk\Requests\Domains\GetDomainStatus;
use TeamNifty\Plesk\Requests\Domains\ListAllDomains;
use TeamNifty\Plesk\Requests\Domains\UpdateDomain;
use TeamNifty\Plesk\Requests\Domains\UpdateDomainStatus;

class Domains extends BaseResource
{
    /**
     * @param  null|string  $name  Domain name.
     * @param  null|string  $description  The description for the domain.
     * @param  null|DomainRequestHostingType  $hostingType  It specifies the hosting type of the created domain. Allowed values: `virtual` | `standard_forwarding` | `frame_forwarding` | `none`.
     *                                                      Meanings: `virtual` - the domain ships with physical hosting.
     *                                                      `standard_forwarding` - the domain ships with standard forwarding.  When the user goes to a domain on which the standard forwarding is set, Plesk redirects this user from the requested URL to the destination URL. This is done explicitly: the user sees the real ‘destination’ address in the path bar of the browser.
     *                                                      `frame_forwarding` - the domain ships with frame forwarding. When the user goes to such site on which frame forwarding is set, Plesk redirects this user from the requested URL to the ‘destination’ URL implicitly (the user still sees the initial URL in the path bar of the browser).
     *                                                      `none` - no hosting ships with the domain.
     * @param  null|array  $hostingSettings  for *physical hosting*:
     *                                       `ftp_login` - it specifies the ftp user login name (required). `ftp_password` - it specifies the ftp user password (required).
     *                                       for *frame forwarding* and *standard forwarding*:
     *                                       `dest_url` - it specifies the URL to which the user will be redirected explicitly at the attempt to visit the specified domain.
     * @param  null|int  $baseDomainId  Domain ID.
     * @param  null|string  $baseDomainName  Domain name.
     * @param  null|string  $baseDomainGuid  Domain GUID.
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     * @param  null|int  $ownerClientId  The client's ID.
     * @param  null|string  $ownerClientLogin  The login name of the client account owner.
     * @param  null|string  $ownerClientGuid  The global user ID of the client account just added to Plesk.
     * @param  null|string  $ownerClientExternalId  The client GUID in the Plesk components (for example, Business Manager).
     * @param  null|array  $ipAddresses  The IP address associated with the domain.
     * @param  null|array  $ipv4  @deprecated
     * @param  null|array  $ipv6  @deprecated
     * @param  null|string  $planName  The service plan by name if it is necessary to create a subscription to a certain service plan.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createNewDomain(
        ?string $name = null,
        ?string $description = null,
        ?DomainRequestHostingType $hostingType = null,
        ?array $hostingSettings = null,
        ?int $baseDomainId = null,
        ?string $baseDomainName = null,
        ?string $baseDomainGuid = null,
        ?int $parentDomainId = null,
        ?string $parentDomainName = null,
        ?string $parentDomainGuid = null,
        ?int $ownerClientId = null,
        ?string $ownerClientLogin = null,
        ?string $ownerClientGuid = null,
        ?string $ownerClientExternalId = null,
        ?array $ipAddresses = null,
        ?array $ipv4 = null,
        ?array $ipv6 = null,
        ?string $planName = null,
    ): Response {
        return $this->connector->send(new CreateNewDomain($name, $description, $hostingType, $hostingSettings, $baseDomainId, $baseDomainName, $baseDomainGuid, $parentDomainId, $parentDomainName, $parentDomainGuid, $ownerClientId, $ownerClientLogin, $ownerClientGuid, $ownerClientExternalId, $ipAddresses, $ipv4, $ipv6, $planName));
    }

    /**
     * @param  int  $id  Domain ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteDomain(int $id): Response
    {
        return $this->connector->send(new DeleteDomain($id));
    }

    /**
     * @param  int  $id  Domain ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function domainDetails(int $id): Response
    {
        return $this->connector->send(new DomainDetails($id));
    }

    /**
     * @param  int  $id  Domain ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDomainClient(int $id): Response
    {
        return $this->connector->send(new GetDomainClient($id));
    }

    /**
     * @param  int  $id  Domain ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDomainStatus(int $id): Response
    {
        return $this->connector->send(new GetDomainStatus($id));
    }

    /**
     * @param  null|string  $name  Filter data by domain name
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listAllDomains(?string $name = null): Response
    {
        return $this->connector->send(new ListAllDomains($name));
    }

    /**
     * @param  int  $id  Domain ID
     * @param  null|string  $name  Domain name.
     * @param  null|string  $description  The description for the domain.
     * @param  null|DomainRequestHostingType  $hostingType  It specifies the hosting type of the created domain. Allowed values: `virtual` | `standard_forwarding` | `frame_forwarding` | `none`.
     *                                                      Meanings: `virtual` - the domain ships with physical hosting.
     *                                                      `standard_forwarding` - the domain ships with standard forwarding.  When the user goes to a domain on which the standard forwarding is set, Plesk redirects this user from the requested URL to the destination URL. This is done explicitly: the user sees the real ‘destination’ address in the path bar of the browser.
     *                                                      `frame_forwarding` - the domain ships with frame forwarding. When the user goes to such site on which frame forwarding is set, Plesk redirects this user from the requested URL to the ‘destination’ URL implicitly (the user still sees the initial URL in the path bar of the browser).
     *                                                      `none` - no hosting ships with the domain.
     * @param  null|array  $hostingSettings  for *physical hosting*:
     *                                       `ftp_login` - it specifies the ftp user login name (required). `ftp_password` - it specifies the ftp user password (required).
     *                                       for *frame forwarding* and *standard forwarding*:
     *                                       `dest_url` - it specifies the URL to which the user will be redirected explicitly at the attempt to visit the specified domain.
     * @param  null|int  $baseDomainId  Domain ID.
     * @param  null|string  $baseDomainName  Domain name.
     * @param  null|string  $baseDomainGuid  Domain GUID.
     * @param  null|int  $parentDomainId  Domain ID.
     * @param  null|string  $parentDomainName  Domain name.
     * @param  null|string  $parentDomainGuid  Domain GUID.
     * @param  null|int  $ownerClientId  The client's ID.
     * @param  null|string  $ownerClientLogin  The login name of the client account owner.
     * @param  null|string  $ownerClientGuid  The global user ID of the client account just added to Plesk.
     * @param  null|string  $ownerClientExternalId  The client GUID in the Plesk components (for example, Business Manager).
     * @param  null|array  $ipAddresses  The IP address associated with the domain.
     * @param  null|array  $ipv4  @deprecated
     * @param  null|array  $ipv6  @deprecated
     * @param  null|string  $planName  The service plan by name if it is necessary to create a subscription to a certain service plan.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateDomain(
        int $id,
        ?string $name = null,
        ?string $description = null,
        ?DomainRequestHostingType $hostingType = null,
        ?array $hostingSettings = null,
        ?int $baseDomainId = null,
        ?string $baseDomainName = null,
        ?string $baseDomainGuid = null,
        ?int $parentDomainId = null,
        ?string $parentDomainName = null,
        ?string $parentDomainGuid = null,
        ?int $ownerClientId = null,
        ?string $ownerClientLogin = null,
        ?string $ownerClientGuid = null,
        ?string $ownerClientExternalId = null,
        ?array $ipAddresses = null,
        ?array $ipv4 = null,
        ?array $ipv6 = null,
        ?string $planName = null,
    ): Response {
        return $this->connector->send(new UpdateDomain($id, $name, $description, $hostingType, $hostingSettings, $baseDomainId, $baseDomainName, $baseDomainGuid, $parentDomainId, $parentDomainName, $parentDomainGuid, $ownerClientId, $ownerClientLogin, $ownerClientGuid, $ownerClientExternalId, $ipAddresses, $ipv4, $ipv6, $planName));
    }

    /**
     * @param  int  $id  Domain ID
     * @param  DomainStatusStatus  $status  Status of the specified domain.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateDomainStatus(int $id, DomainStatusStatus $status): Response
    {
        return $this->connector->send(new UpdateDomainStatus($id, $status));
    }
}
