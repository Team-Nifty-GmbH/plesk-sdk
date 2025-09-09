<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Requests\Auth\DeleteSecretKey;
use TeamNifty\Plesk\Requests\Auth\GenerateSecretKey;

class Auth extends BaseResource
{
    /**
     * @param  string  $key  Key ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteSecretKey(string $key): Response
    {
        return $this->connector->send(new DeleteSecretKey($key));
    }

    /**
     * @param  null|string  $ip  The IP address that will be linked to the key. If this node or 'ips' node is not specified, the IP address of the request sender will be used.
     * @param  null|array  $ips  Array of IP addresses that will be linked to the key. If this node or 'ip' node is not specified, the IP address of the request sender will be used.
     * @param  null|string  $login  The login name of an existing customer or a reseller that will have this secret key. The customer's or reseller's account should be active. If this node is not specified, the administrator's login will be used.
     * @param  null|string  $description  Additional information about the key.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function generateSecretKey(
        ?string $ip = null,
        ?array $ips = null,
        ?string $login = null,
        ?string $description = null,
    ): Response {
        return $this->connector->send(new GenerateSecretKey($ip, $ips, $login, $description));
    }
}
