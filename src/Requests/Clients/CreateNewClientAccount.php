<?php

namespace TeamNifty\Plesk\Requests\Clients;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Enums\ClientType;

/**
 * Create a new Client account
 */
class CreateNewClientAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
     */
    public function __construct(
        protected string $name,
        protected ?string $company,
        protected string $login,
        protected ?int $status,
        protected string $email,
        protected ?string $locale,
        protected ?string $ownerLogin,
        protected ?string $externalId,
        protected ?string $description,
        protected string $password,
        protected ClientType $type,
    ) {}

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
            'type' => $this->type->value,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/clients';
    }
}
