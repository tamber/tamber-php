<?php

namespace Tamber;

class Discover extends Resource {
	function __construct($params=array()) {
		$this->data = self::_get_args($params, ['number', 'page', 'filter']);
	}

	private function _url($command) {
		return self::_get_url('discover', $command);
	}

	public function recommended($params=array()) {
		$keys = ['id', 'number', 'page', 'filter'];
		self::_call_api('POST',  $this->_url('recommended'), $params, $keys);
	}

	public function similar($params=array()) {
		$keys = ['id', 'number', 'page', 'filter'];
		self::_call_api('POST', $this->_url('similar'), $params, $keys);
	}

	public function recommendedSimilar($params=array()) {
		$keys = ['actor', 'item', 'number', 'page', 'filter'];
		self::_call_api('POST',  $this->_url('recommendedSimilar'), $params, $keys);
	}

	public function popular($params=array()) {
		$keys = ['number', 'page', 'filter'];
		self::_call_api('POST',  $this->_url('popular'), $params, $keys);
	}

	public function hot($params=array()) {
		$keys = ['number', 'page', 'filter'];
		self::_call_api('POST',  $this->_url('hot'), $params, $keys);
	}
}

?>