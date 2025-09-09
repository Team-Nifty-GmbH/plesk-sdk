<?php

namespace TeamNifty\Plesk;

use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Auth\MultiAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Makeable;
use TeamNifty\Plesk\Resource\Auth;
use TeamNifty\Plesk\Resource\Cli;
use TeamNifty\Plesk\Resource\Clients;
use TeamNifty\Plesk\Resource\Databases;
use TeamNifty\Plesk\Resource\Dns;
use TeamNifty\Plesk\Resource\Domains;
use TeamNifty\Plesk\Resource\Extensions;
use TeamNifty\Plesk\Resource\FtpUsers;
use TeamNifty\Plesk\Resource\Server;

/**
 * Plesk RESTful API
 */
class Plesk extends Connector
{
    use Makeable;

    /**
     * @param  string  $url  The base URL for the API
     */
    public function __construct(
        protected string $url,
        protected string $username,
        protected string $password,
        protected string $apiKey,
    ) {}

    public function auth(): Auth
    {
        return new Auth($this);
    }

    public function cli(): Cli
    {
        return new Cli($this);
    }

    public function clients(): Clients
    {
        return new Clients($this);
    }

    public function databases(): Databases
    {
        return new Databases($this);
    }

    public function dns(): Dns
    {
        return new Dns($this);
    }

    public function domains(): Domains
    {
        return new Domains($this);
    }

    public function extensions(): Extensions
    {
        return new Extensions($this);
    }

    public function ftpUsers(): FtpUsers
    {
        return new FtpUsers($this);
    }

    public function getAuthenticator(): MultiAuthenticator
    {
        return new MultiAuthenticator(
            new BasicAuthenticator($this->username, $this->password),
            new HeaderAuthenticator($this->apiKey, 'X-API-Key')
        );
    }

    public function resolveBaseUrl(): string
    {
        return $this->url . '/api/v2';
    }

    public function server(): Server
    {
        return new Server($this);
    }
}
