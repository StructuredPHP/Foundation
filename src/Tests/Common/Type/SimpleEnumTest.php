<?php
namespace StructuredPHP\Tests\Common\Type;

use StructuredPHP\Tests\Objects\SimpleEnum;
class SimpleEnumTest extends \PHPUnit_Framework_TestCase {
	
	public function testToArray() {
		$array = SimpleEnum::toArray();
		$this->assertEquals("test", $array['NAME']);
		$this->assertEquals("tundra", $array["COMPANY"]);
	}
	
	public function testValid() {
		$valid = SimpleEnum::valid(SimpleEnum::NAME);
		$this->assertTrue($valid);
		$invalid = SimpleEnum::valid("any value");
		$this->assertFalse($invalid);
	}
	
}