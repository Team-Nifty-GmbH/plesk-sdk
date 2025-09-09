<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Requests\Server\InstallingLicenseKey;
use TeamNifty\Plesk\Requests\Server\PerformingInitialServerSetup;
use TeamNifty\Plesk\Requests\Server\ServerIpAddresses;
use TeamNifty\Plesk\Requests\Server\ServerMetaInformation;

class Server extends BaseResource
{
    /**
     * @param  null|string  $key  License key data.
     * @param  null|string  $code  Activation code.
     * @param  null|bool  $additional  It specifies if the key that will be installed is an additional key.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function installingLicenseKey(?string $key = null, ?string $code = null, ?bool $additional = null): Response
    {
        return $this->connector->send(new InstallingLicenseKey($key, $code, $additional));
    }

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
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function performingInitialServerSetup(
        ?string $adminName,
        ?string $adminEmail,
        ?string $adminCompany,
        ?string $adminPhone,
        ?string $adminFax,
        ?string $adminAddress,
        ?string $adminCity,
        ?string $adminState,
        ?string $adminPostCode,
        ?string $adminCountry,
        ?bool $adminSendAnnounce,
        ?string $adminLocale,
        ?bool $adminMultipleSessions,
        string $password,
        ?string $serverName = null,
    ): Response {
        return $this->connector->send(new PerformingInitialServerSetup($adminName, $adminEmail, $adminCompany, $adminPhone, $adminFax, $adminAddress, $adminCity, $adminState, $adminPostCode, $adminCountry, $adminSendAnnounce, $adminLocale, $adminMultipleSessions, $password, $serverName));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function serverIpAddresses(): Response
    {
        return $this->connector->send(new ServerIpAddresses());
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function serverMetaInformation(): Response
    {
        return $this->connector->send(new ServerMetaInformation());
    }
}
