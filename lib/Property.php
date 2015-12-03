<?php

namespace Tamber;

class Property extends Resource {
	function __construct($params=array()) {
		$this->data = self::_get_args($params, ['name', 'type', 'created']);
	}

	private function _url($command) {
		return self::_get_url('property', $command);
	}

	public function create($params=array()) {
		self::_call_api('POST',  $this->_url('create'), $params);
	}

	public function retrieve($params=array()) {
		$keys = ['name'];
		self::_call_api('POST',  $this->_url('retrieve'), $params, $keys);
	}

	public function remove($params=array()) {
		$keys = ['name'];
		self::_call_api('POST',  $this->_url('remove'), $params, $keys);
	}
}

?>