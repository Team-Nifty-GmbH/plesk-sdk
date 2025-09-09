<?php

namespace TeamNifty\Plesk\Requests\Server;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Performing initial server setup
 */
class PerformingInitialServerSetup extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|string  $adminName  The administrator's personal name.
     * @param  null|string  $adminEmail  The administrator's e-mail address.
     * @param  null|string  $adminCompany  The administrator's company name.
     * @param  null|string  $adminPhone  The administrator's phone number.
     * @param  null|string  $adminFax  The administrator's fax number.
     * @param  null|string  $adminAddress  The administrator's street address.
     * @param  null|string  $adminCity  The name of the city where administrator lives.
     * @param  null|string  $adminState  The name of state (for US citizens) or province where administrator lives.
     * @param  null|string  $adminPostCode  The administrator's zip/postal code.
     * @param  null|string  $adminCountry  The name of the country where administrator lives.
     * @param  null|bool  $adminSendAnnounce  It specifies whether Plesk announcement messages are sent to the administrator's e-mail.
     * @param  null|string  $adminLocale  The locale used by the administrator.
     * @param  null|bool  $adminMultipleSessions  It specifies the information if the administrator has multiple sessions in Plesk.
     * @param  string  $password  The new Plesk Administrator's password that will replace the default one.
     * @param  null|string  $serverName  The full host name.
     */
    public function __construct(
        protected ?string $adminName,
        protected ?string $adminEmail,
        protected ?string $adminCompany,
        protected ?string $adminPhone,
        protected ?string $adminFax,
        protected ?string $adminAddress,
        protected ?string $adminCity,
        protected ?string $adminState,
        protected ?string $adminPostCode,
        protected ?string $adminCountry,
        protected ?bool $adminSendAnnounce,
        protected ?string $adminLocale,
        protected ?bool $adminMultipleSessions,
        protected string $password,
        protected ?string $serverName = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'password' => $this->password,
            'server_name' => $this->serverName,
            'admin' => array_filter([
                'name' => $this->adminName,
                'email' => $this->adminEmail,
                'company' => $this->adminCompany,
                'phone' => $this->adminPhone,
                'fax' => $this->adminFax,
                'address' => $this->adminAddress,
                'city' => $this->adminCity,
                'state' => $this->adminState,
                'post_code' => $this->adminPostCode,
                'country' => $this->adminCountry,
                'send_announce' => $this->adminSendAnnounce,
                'locale' => $this->adminLocale,
                'multiple_sessions' => $this->adminMultipleSessions,
            ]),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/server/init';
    }
}
