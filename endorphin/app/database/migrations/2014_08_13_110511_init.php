<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Init extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('remember_token');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'MyISAM';
        });

		Schema::create('devices', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('hardware_id');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'MyISAM';
        });

        Schema::create('device_user', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });

        Schema::create('heartbeats', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('location_lon')->nullable();
            $table->string('location_lat')->nullable();
            $table->boolean('battery_charging');
            $table->tinyInteger('battery_level')->unsigned();
            $table->string('network_name')->nullable();
            $table->smallInteger('network_signal_strength_dbm');
            $table->smallInteger('network_signal_strength_asu');
            $table->tinyInteger('network_type')->unsigned();
            $table->boolean('network_inservice');
            $table->boolean('network_roaming');
            $table->boolean('network_connected');
            $table->string('phone_number')->nullable();
            $table->string('phone_imei')->nullable();
            $table->string('phone_imei_sv')->nullable();
            $table->string('wifi_ip_v4')->nullable();
            $table->string('wifi_ip_v6')->nullable();
            $table->string('wifi_mac')->nullable();
            $table->string('bluetooth_address')->nullable();
            $table->string('serial_number')->nullable();
            $table->time('uptime')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'MyISAM';
        });
        // DB::statement('ALTER TABLE heartbeats ADD location_point POINT' );

        Schema::create('heartbeat_device', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices');
            $table->bigInteger('heartbeat_id')->unsigned();
            $table->foreign('heartbeat_id')->references('id')->on('heartbeats')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('heartbeat_device', function(Blueprint $table) {
            $table->drop();
        });
        Schema::table('heartbeats', function(Blueprint $table) {
            $table->drop();
        });
        Schema::table('device_user', function(Blueprint $table) {
            $table->drop();
        });
        Schema::table('devices', function(Blueprint $table) {
            $table->drop();
        });
        Schema::table('users', function(Blueprint $table) {
            $table->drop();
        });
  	}
}
