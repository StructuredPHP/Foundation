<?php
namespace StructuredPHP\Common\Type;

/**
 * Abstract Iterator
 * 
 * @author haihao
 *
 */
abstract class Iteratored extends Object implements \Iterator {
	
	private $position = 0;
	
	public function __construct() {
		$this->position = 0;
		$this->data = array();
	}
	
	public function current () {
		return $this->data[$this->position];
	}
	
	public function next () {
		++$this->position;
		return $this;
	}
	
	public function key () {
		return $this->position;
	}
	
	public function valid () {
		return isset($this->data[$this->position]);
	}
	
	public function rewind () {
		$this->position = 0;
		return $this;
	}
}