<?php

namespace TeamNifty\Plesk\Requests\Clients;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\CreatedResponse;

/**
 * Update client account
 */
class UpdateClientAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

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
     */
    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?string $company = null,
        protected ?string $login = null,
        protected ?int $status = null,
        protected ?string $email = null,
        protected ?string $locale = null,
        protected ?string $ownerLogin = null,
        protected ?string $externalId = null,
        protected ?string $description = null,
        protected ?string $password = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return CreatedResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'company' => $this->company,
            'login' => $this->login,
            'status' => $this->status,
            'email' => $this->email,
            'locale' => $this->locale,
            'owner_login' => $this->ownerLogin,
            'external_id' => $this->externalId,
            'description' => $this->description,
            'password' => $this->password,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return "/clients/{$this->id}";
    }
}
