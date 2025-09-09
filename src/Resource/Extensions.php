<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Requests\Extensions\DeleteExtension;
use TeamNifty\Plesk\Requests\Extensions\DisableExtension;
use TeamNifty\Plesk\Requests\Extensions\EnableExtension;
use TeamNifty\Plesk\Requests\Extensions\ExtensionDetails;
use TeamNifty\Plesk\Requests\Extensions\InstallNewExtension;
use TeamNifty\Plesk\Requests\Extensions\ListOfInstalledExtensions;

class Extensions extends BaseResource
{
    /**
     * @param  string  $id  Extension identifier
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteExtension(string $id): Response
    {
        return $this->connector->send(new DeleteExtension($id));
    }

    /**
     * @param  string  $id  Extension identifier
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function disableExtension(string $id): Response
    {
        return $this->connector->send(new DisableExtension($id));
    }

    /**
     * @param  string  $id  Extension identifier
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function enableExtension(string $id): Response
    {
        return $this->connector->send(new EnableExtension($id));
    }

    /**
     * @param  string  $id  Extension identifier
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function extensionDetails(string $id): Response
    {
        return $this->connector->send(new ExtensionDetails($id));
    }

    /**
     * @param  null|string  $id  Installation by Identifier.
     * @param  null|string  $url  Installation by URL.
     * @param  null|string  $file  Installation by file.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function installNewExtension(?string $id = null, ?string $url = null, ?string $file = null): Response
    {
        return $this->connector->send(new InstallNewExtension($id, $url, $file));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listOfInstalledExtensions(): Response
    {
        return $this->connector->send(new ListOfInstalledExtensions());
    }
}
