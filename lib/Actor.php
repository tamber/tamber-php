<?php

namespace Tamber;

class Actor extends Resource {
	function __construct($params=array()) {
		$this->data = self::_get_args($params, ['id', 'behaviors', 'created']);
	}

	private function _url($command) {
		return self::_get_url('actor', $command);
	}

	public function create($params=array()) {
		self::_call_api('POST',  $this->_url('create'), $params);
	}

	public function addBehaviors($params=array()) {
		$keys = ['id', 'behaviors', 'getRecs'];
		self::_call_api('POST', $this->_url('addBehaviors'), $params, $keys);
	}

	public function removeBehaviors($params=array()) {
		$keys = ['id', 'behaviors', 'getRecs'];
		self::_call_api('POST',  $this->_url('removeBehaviors'), $params, $keys);
	}

	public function retrieve($params=array()) {
		$keys = ['id', 'getRecs'];
		self::_call_api('POST',  $this->_url('retrieve'), $params, $keys);
	}

	public function remove($params=array()) {
		$keys = ['id'];
		self::_call_api('POST',  $this->_url('remove'), $params, $keys);
	}
}

?>