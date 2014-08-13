<?php

class ApiDevicesController extends BaseController {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
	public $restful = true;

	public function index()
	{
		$devices = Device::with(
			array(
			'users' => function($query) {
				$query->where('device_user.user_id', '=', Auth::user()->id);
			},
			'heartbeats' => function($query) {
			}
			)
		)->whereNull('deleted_at')->get();

		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $devices);
	}

	public function show($deviceId)
	{
		$device = Device::with(
			array(
			'users' => function($query) {
				$query->where('device_user.user_id', '=', Auth::user()->id);
			},
			'heartbeats' => function($query) {
			}
			)
		)->where('id', '=', $deviceId)->whereNull('deleted_at')->first();

		if(is_null($device)) {
			return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_NOTFOUND, array());
		}

		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $device);
	}

	public function update($deviceId)
	{
		// TODO
		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, array());
	}

	public function destroy($deviceId)
	{
		$device = User::find(Auth::user()->id)->devices()->where('devices.id', '=', $deviceId)->whereNull('devices.deleted_at')->first();

		if(is_null($note)){
			return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_NOTFOUND, array('item'=>'device', 'id'=>$deviceId));
		}

		$deletedDevice = $device;
		$device->delete();
		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $device);
	}
}

?>