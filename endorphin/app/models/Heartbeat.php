<?php

class Heartbeat extends Eloquent {
	use SoftDeletingTrait;
	protected $softDelete = true;
	protected $table = 'heartbeats';
	protected $fillable = array(
		'location_lon',
		'location_lat',
		'battery_charging',
		'battery_level',
		'network_name',
		'network_signal_strength_dbm',
		'network_signal_strength_asu',
		'network_type',
		'network_inservice',
		'network_roaming',
		'network_connected',
		'phone_number',
		'phone_imei',
		'phone_imei_sv',
		'wifi_ip_v4',
		'wifi_ip_v6',
		'wifi_mac',
		'bluetooth_address',
		'serial_number',
		'uptime'
		// 'location_point'
	);

	public function devices() {
		return $this->belongsToMany('Device');
	}
}

?>
