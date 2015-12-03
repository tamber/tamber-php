<?php

namespace Tamber;

class Behavior extends Resource {
	function __construct($params=array()) {
		$this->data = self::_get_args($params, ['name', 'type', 'desirability', 'params', 'created']);
	}

	private function _url($command) {
		return self::_get_url('behavior', $command);
	}

	public function create($params=array()) {
		self::_call_api('POST',  $this->_url('create'), $params);
	}

	public function update($params=array()) {
		$keys = ['name', 'type', 'desirability', 'params'];
		self::_call_api('POST', $this->_url('update'), $params, $keys);
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