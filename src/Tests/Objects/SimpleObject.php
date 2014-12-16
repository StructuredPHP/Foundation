<?php
namespace StructuredPHP\Tests\Objects;

use StructuredPHP\Common\Type\Object;
use StructuredPHP\Tests\Objects\Annotation\SimpleAnnotation as SA;

/**
 * 
 * @author haihao
 * 
 * @SA(name="test",type="class")
 */
class SimpleObject extends Object {

	/**
	 * @SA(name="simple", type="property")
	 */
	protected $name;
	
	public function __construct() {
		$this->name = "test object";
	}
	
	/**
	 * @SA(name="a", type="method")
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @SA(name="b", type="method")
	 */
	public function getName() {
		return $this->name;
	}	
}