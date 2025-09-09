<?php

namespace TeamNifty\Plesk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \TeamNifty\Plesk\Resource\Auth auth()
 * @method static \TeamNifty\Plesk\Resource\Cli cli()
 * @method static \TeamNifty\Plesk\Resource\Clients clients()
 * @method static \TeamNifty\Plesk\Resource\Databases databases()
 * @method static \TeamNifty\Plesk\Resource\Dns dns()
 * @method static \TeamNifty\Plesk\Resource\Domains domains()
 * @method static \TeamNifty\Plesk\Resource\Extensions extensions()
 * @method static \TeamNifty\Plesk\Resource\FtpUsers ftpUsers()
 * @method static \TeamNifty\Plesk\Resource\Server server()
 *
 * @see \TeamNifty\Plesk\Plesk
 */
class Plesk extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \TeamNifty\Plesk\Plesk::class;
    }
}
