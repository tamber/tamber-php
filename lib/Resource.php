<?php

namespace Tamber;

class Resource implements \ArrayAccess {
	protected $data = array();

	protected static function _get_url($resource, $command) {
		$apiUrl = Tamber::$apiUrl;
		return "{$apiUrl}/{$resource}/{$command}";
	}

	protected function _get_args($params=array(), $keys=array()) {
		$c = $this->data;
		if (!empty($params)) {
			$c = array_merge($c, $params);
		}
		if (!empty($keys)) {
			$c = array_intersect_key($c, array_flip($keys));
		}
		return $c;
	}

	protected function update($params) {
		$this->data = array_merge($this->data, $params);
	}

	protected function _call_api($method, $url, $params=array(), $keys=array(), $update=TRUE) {
		$args = $this->_get_args($params, $keys);
		$resp = Tamber::_call_api($method, $url, $args);
		if (isset($resp['error'])) {
			throw new \Exception($resp['error']);
		}
		if ($update) {
			$this->update($resp);
		}
		return $this;
	}

	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this->data[] = $value;
		} else {
			$this->data[$offset] = $value;
		}
	}

	public function offsetExists($offset) {
		return isset($this->data[$offset]);
	}

	public function offsetUnset($offset) {
		unset($this->data[$offset]);
	}

	public function offsetGet($offset) {
		return isset($this->data[$offset]) ? $this->data[$offset] : null;
	}

	function __toString() {
		return json_encode($this->data);
	}
}

?>