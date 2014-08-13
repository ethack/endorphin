<?php

namespace Endorphin;

use Illuminate\Support\ServiceProvider;

class EndorphinHelpersServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('endorphinhelpers', function()
        {
            return new EndorphinHelpers;
        });
    }

}

?>