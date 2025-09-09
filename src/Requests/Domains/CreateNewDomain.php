<?php

namespace TeamNifty\Plesk\Requests\Domains;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Enums\DomainRequestHostingType;

/**
 * Create a new Domain
 */
class CreateNewDomain extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $description = null,
        protected ?DomainRequestHostingType $hostingType = null,
        protected ?array $hostingSettings = null,
        protected ?int $baseDomainId = null,
        protected ?string $baseDomainName = null,
        protected ?string $baseDomainGuid = null,
        protected ?int $parentDomainId = null,
        protected ?string $parentDomainName = null,
        protected ?string $parentDomainGuid = null,
        protected ?int $ownerClientId = null,
        protected ?string $ownerClientLogin = null,
        protected ?string $ownerClientGuid = null,
        protected ?string $ownerClientExternalId = null,
        protected ?array $ipAddresses = null,
        protected ?array $ipv4 = null,
        protected ?array $ipv6 = null,
        protected ?string $planName = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'description' => $this->description,
            'hosting_type' => $this->hostingType?->value,
            'hosting_settings' => $this->hostingSettings,
            'ip_addresses' => $this->ipAddresses,
            'ipv4' => $this->ipv4,
            'ipv6' => $this->ipv6,
            'base_domain' => array_filter(['id' => $this->baseDomainId, 'name' => $this->baseDomainName, 'guid' => $this->baseDomainGuid]),
            'parent_domain' => array_filter(['id' => $this->parentDomainId, 'name' => $this->parentDomainName, 'guid' => $this->parentDomainGuid]),
            'owner_client' => array_filter([
                'id' => $this->ownerClientId,
                'login' => $this->ownerClientLogin,
                'guid' => $this->ownerClientGuid,
                'external_id' => $this->ownerClientExternalId,
            ]),
            'plan' => array_filter(['name' => $this->planName]),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/domains';
    }
}
