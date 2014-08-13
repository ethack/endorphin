<?php

class ApiHeartbeatsController extends BaseController {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
	public $restful = true;

	public function index($deviceId)
	{
		$devices = Device::with(
			array(
			'users' => function($query) {
				$query->where('device_user.user_id', '=', Auth::user()->id);
			},
			'heartbeats' => function($query) {
			}
			)
		)->where('id', '=', $deviceId)->whereNull('deleted_at')->get();

		$heartbeats->heartbeats()->get();

		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $heartbeats);
	}

	public function show($deviceId, $heartbeatId)
	{
		$device = Device::with(
			array(
			'users' => function($query) {
				$query->where('device_user.user_id', '=', Auth::user()->id);
			},
			'heartbeats' => function($query) {
			}
			)
		)->where('id', '=', $deviceId)->whereNull('deleted_at')->get();

		if(is_null($device)) {
			return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_NOTFOUND, array());
		}

		$heartbeats = $device->heartbeats()->where('id', ($heartbeatId == 'latest' ? '>' : '='), ($heartbeatId == 'latest' ? '0' : $heartbeatId))->orderBy('created_at', 'desc')->first();
		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $heartbeats);
	}

	public function beat()
	{
		$data = Input::all();

		// return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $data['data']);


		if(is_null($data)) {
			return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_ERROR, array('item'=>'data'));
		}

		if(is_null($data['phone_imei'])) {
			return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_ERROR, array('item'=>'phone_imei'));
		}

		$heartbeat = new Heartbeat($data);
		$heartbeat->save();

		$device = Device::with(
			array(
			'users' => function($query) {
				$query->where('device_user.user_id', '=', Auth::user()->id);
			},
			'heartbeats' => function($query) {
			}
			)
		)->where('hardware_id', '=', $data['phone_imei'])->whereNull('deleted_at')->get();

		if(is_null($device)) {
			$device = new Device(array('name' => $data['phone_imei'], 'hardware_id' => $data['phone_imei']));
			$device->save();
		}

		$device->heartbeats()->attach($heartbeat);

		return EndorphinHelpers::apiResponse(EndorphinHelpers::STATUS_SUCCESS, $device);
	}
}

?>