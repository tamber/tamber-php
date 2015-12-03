<?php

namespace Tamber;

class Filter implements \ArrayAccess {
	private $filter = array();

	function __construct($function, $args) {
		$this[$function] = $args;
	}

	function __toString() {
		return json_encode($this->filter);
	}

	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this->filter[] = $value;
		} else {
			$this->filter[$offset] = $value;
		}
	}

	public function offsetExists($offset) {
		return isset($this->filter[$offset]);
	}

	public function offsetUnset($offset) {
		unset($this->filter[$offset]);
	}

	public function offsetGet($offset) {
		return isset($this->filter[$offset]) ? $this->filter[$offset] : null;
	}
}

function FilterAnd($args) {
	return new Filter('and', $args);
}

function FilterOr($args) {
	return new Filter('or', $args);
}

function FilterGt($args) {
	return new Filter('gt', $args);
}

function FilterGte($args) {
	return new Filter('gte', $args);
}

function FilterLt($args) {
	return new Filter('lt', $args);
}

function FilterLte($args) {
	return new Filter('lte', $args);
}

function FilterEq($args) {
	return new Filter('eq', $args);
}

function FilterNot($arg) {
	return new Filter('not', [$arg]);
}

function FilterProperty($property) {
	return new Filter('property', $property);
}

?>