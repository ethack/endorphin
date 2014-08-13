<?php

class Device extends Eloquent {
	use SoftDeletingTrait;
	protected $softDelete = true;
	protected $table = 'devices';
	protected $fillable = array('name', 'hardware_id');


	public function users() {
		return $this->belongsToMany('User');
	}

	public function heartbeats() {
		return $this->belongsToMany('Heartbeat');
	}
}

?>
