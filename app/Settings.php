<?php namespace App;

class Settings {
	private $container = [];
	public function __construct() {
		$settings = \DB::table('settings')->get();
		foreach($settings as $s) {
			$this->container[$s->name] = $s->value;
		}
	}

	public function __get($key) {
		if(isset($this->container[$key])) {
			return $this->container[$key];
		}
	}
}