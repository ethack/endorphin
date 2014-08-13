<?php

class ApiI18nController extends BaseController {
	public $restful = true;

	public function index()
	{
		$i18n = array(
			'keywords' => Lang::get('keywords'),
			'messages' => Lang::get('messages'),
			'pagination' => Lang::get('pagination'),
			'reminders' => Lang::get('reminders'),
			'users' => Lang::get('users'),
			'validation' => Lang::get('validation')
		);
		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $i18n);
	}

	public function show($translation)
	{
		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, Lang::get($translation));
	}
}

?>