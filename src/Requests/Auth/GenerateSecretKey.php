<?php

namespace TeamNifty\Plesk\Requests\Auth;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Generate a secret key
 */
class GenerateSecretKey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|string  $ip  The IP address that will be linked to the key. If this node or 'ips' node is not specified, the IP address of the request sender will be used.
     * @param  null|array  $ips  Array of IP addresses that will be linked to the key. If this node or 'ip' node is not specified, the IP address of the request sender will be used.
     * @param  null|string  $login  The login name of an existing customer or a reseller that will have this secret key. The customer's or reseller's account should be active. If this node is not specified, the administrator's login will be used.
     * @param  null|string  $description  Additional information about the key.
     */
    public function __construct(
        protected ?string $ip = null,
        protected ?array $ips = null,
        protected ?string $login = null,
        protected ?string $description = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['ip' => $this->ip, 'ips' => $this->ips, 'login' => $this->login, 'description' => $this->description]);
    }

    public function resolveEndpoint(): string
    {
        return '/auth/keys';
    }
}
