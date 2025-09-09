<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Enums\ClientType;
use TeamNifty\Plesk\Requests\Clients\ActivateClient;
use TeamNifty\Plesk\Requests\Clients\ClientDetails;
use TeamNifty\Plesk\Requests\Clients\CreateNewClientAccount;
use TeamNifty\Plesk\Requests\Clients\DeleteClientAccount;
use TeamNifty\Plesk\Requests\Clients\GetClientStats;
use TeamNifty\Plesk\Requests\Clients\ListAllClients;
use TeamNifty\Plesk\Requests\Clients\ListOfClientDomains;
use TeamNifty\Plesk\Requests\Clients\SuspendClient;
use TeamNifty\Plesk\Requests\Clients\UpdateClientAccount;

class Clients extends BaseResource
{
    /**
     * @param  int  $id  Client ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function activateClient(int $id): Response
    {
        return $this->connector->send(new ActivateClient($id));
    }

    /**
     * @param  int  $id  Client ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function clientDetails(int $id): Response
    {
        return $this->connector->send(new ClientDetails($id));
    }

    /**
     * @param  string  $name  Client's personal name (1 to 60 characters long).
     * @param  null|string  $company  The company name (0 to 60 characters long).
     * @param  string  $login  The login name of the client account (1 to 60 characters long).
     * @param  null|int  $status  The current status of the client account. Allowed values: 0 (active) | 16 (disabled by admin) | 4 (under backup/restore) | 256 (expired).
     * @param  string  $email  The email address of the client account owner (0 to 255 characters long).
     * @param  null|string  $locale  The locale used on the client account. Default value: en-US.
     * @param  null|string  $ownerLogin  The login name of a client account owner. If the client account owner is Plesk Administrator, specify the admin login name.
     * @param  null|string  $externalId  The client GUID in the Plesk components (for example, Business Manager).
     * @param  null|string  $description  The description for the client account.
     * @param  string  $password  The password of the client account (5 to 14 characters long).
     * @param  ClientType  $type  The type of the client account. Allowed values: reseller | customer | admin.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createNewClientAccount(
        string $name,
        ?string $company,
        string $login,
        ?int $status,
        string $email,
        ?string $locale,
        ?string $ownerLogin,
        ?string $externalId,
        ?string $description,
        string $password,
        ClientType $type,
    ): Response {
        return $this->connector->send(new CreateNewClientAccount($name, $company, $login, $status, $email, $locale, $ownerLogin, $externalId, $description, $password, $type));
    }

    /**
     * @param  int  $id  Client ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteClientAccount(int $id): Response
    {
        return $this->connector->send(new DeleteClientAccount($id));
    }

    /**
     * @param  int  $id  Client ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getClientStats(int $id): Response
    {
        return $this->connector->send(new GetClientStats($id));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listAllClients(): Response
    {
        return $this->connector->send(new ListAllClients());
    }

    /**
     * @param  int  $id  Client ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listOfClientDomains(int $id): Response
    {
        return $this->connector->send(new ListOfClientDomains($id));
    }

    /**
     * @param  int  $id  Client ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function suspendClient(int $id): Response
    {
        return $this->connector->send(new SuspendClient($id));
    }

    /**
     * @param  int  $id  Client ID
     * @param  null|string  $name  Client's personal name (1 to 60 characters long).
     * @param  null|string  $company  The company name (0 to 60 characters long).
     * @param  null|string  $login  The login name of the client account (1 to 60 characters long).
     * @param  null|int  $status  The current status of the client account. Allowed values: 0 (active) | 16 (disabled by admin) | 4 (under backup/restore) | 256 (expired).
     * @param  null|string  $email  The email address of the client account owner (0 to 255 characters long).
     * @param  null|string  $locale  The locale used on the client account. Default value: en-US.
     * @param  null|string  $ownerLogin  The login name of a client account owner. If the client account owner is Plesk Administrator, specify the admin login name.
     * @param  null|string  $externalId  The client GUID in the Plesk components (for example, Business Manager).
     * @param  null|string  $description  The description for the client account.
     * @param  null|string  $password  The password of the client account (5 to 14 characters long).
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateClientAccount(
        int $id,
        ?string $name = null,
        ?string $company = null,
        ?string $login = null,
        ?int $status = null,
        ?string $email = null,
        ?string $locale = null,
        ?string $ownerLogin = null,
        ?string $externalId = null,
        ?string $description = null,
        ?string $password = null,
    ): Response {
        return $this->connector->send(new UpdateClientAccount($id, $name, $company, $login, $status, $email, $locale, $ownerLogin, $externalId, $description, $password));
    }
}
