<?php
namespace StructuredPHP\Tests\Objects;

use StructuredPHP\Common\Type\Object;


class SimpleObject extends Object {

	protected $name;
	
	public function __construct() {
		$this->name = "test object";
	}
	
}