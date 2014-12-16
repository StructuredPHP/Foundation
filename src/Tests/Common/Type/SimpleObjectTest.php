<?php
namespace StructuredPHP\Tests\Common\Type;


use StructuredPHP\Tests\Objects\SimpleObject;
class SimpleObjectTest extends \PHPUnit_Framework_TestCase{

	protected $test_subject;
	
	public function setUp() {
		$this->test_subject = new SimpleObject();
	}
	
	public function testToArray() {		
		$array = $this->test_subject->toArray();
		$this->assertEquals("test object", $array['name']);
	}
	
	public function testGetClassName() {
		$name = $this->test_subject->getClassName();
		$this->assertEquals("SimpleObject", $name);
	}
	
	public function testEqual() {
		$object = new SimpleObject();
		$this->test_subject->equals($object);
	}
}