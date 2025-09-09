<?php

use TeamNifty\Plesk\Plesk;

if (! function_exists('plesk')) {
    /**
     * Get the Plesk instance.
     */
    function plesk(): Plesk
    {
        return app(Plesk::class);
    }
}
