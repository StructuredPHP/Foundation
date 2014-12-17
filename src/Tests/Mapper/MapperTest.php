<?php
namespace StructuredPHP\Tests\Mapper;

use StructuredPHP\Tests\Objects\SimpleObject;
use StructuredPHP\Mapper\SimpleMapper;
use StructuredPHP\Mapper\ArrayObjectMapper;
class MapperTest extends \PHPUnit_Framework_TestCase {
	
	public function testSimpleMapper() {
		$a = new SimpleObject();
		$b = new \stdClass();
		$b->name = "from";
		
		$mapper = new SimpleMapper();
		$mapper->map($b, $a);
		$this->assertEquals("from", $a->getName());
	}
	
	public function testArrayMapper() {
		$from = array("name"=>"say_hi");
		$to = new SimpleObject();
		
		$mapper = new ArrayObjectMapper();
		$mapper->map($from, $to);
		$this->assertEquals("say_hi", $to->getName());
	}
	
}