<?php

namespace Tamber;

class Item extends Resource {
	function __construct($params=array()) {
		$this->data = self::_get_args($params, ['id', 'properties', 'tags', 'created']);
	}

	private function _url($command) {
		return self::_get_url('item', $command);
	}

	public function create($params=array()) {
		self::_call_api('POST',  $this->_url('create'), $params);
	}

	public function addProperties($params=array()) {
		$keys = ['id', 'properties'];
		self::_call_api('POST', $this->_url('addProperties'), $params, $keys);
	}

	public function removeProperties($params=array()) {
		$keys = ['id', 'properties'];
		self::_call_api('POST',  $this->_url('removeProperties'), $params, $keys);
	}

	public function addTags($params=array()) {
		$keys = ['id', 'tags'];
		self::_call_api('POST',  $this->_url('addTags'), $params, $keys);
	}

	public function removeTags($params=array()) {
		$keys = ['id', 'tags'];
		self::_call_api('POST',  $this->_url('removeTags'), $params, $keys);
	}

	public function retrieve($params=array()) {
		$keys = ['id'];
		self::_call_api('GET',  $this->_url('retrieve'), $params, $keys);
	}

	public function remove($params=array()) {
		$keys = ['id'];
		self::_call_api('POST',  $this->_url('remove'), $params, $keys);
	}
}

?>