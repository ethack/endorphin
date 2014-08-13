<?php

use Illuminate\Support\Facades\Facade;

class EndorphinHelpers extends Facade {
	const STATUS_SUCCESS = 200;
	const STATUS_ERROR = 400;
	const STATUS_NOTFOUND = 404;

    protected static function getFacadeAccessor() { return 'endorphinhelpers'; }

}

?>