<?php
namespace StructuredPHP\Tests\Common\Util;

use StructuredPHP\Common\Util\StringBuilder;

class StringBuilderTest extends \PHPUnit_Framework_TestCase {
	
	protected $test_subject;
	
	public function setUp() {
		$this->test_subject = new StringBuilder("test_To_Camel");
	}
	
	public function testSnakeToCamel() {
		$this->assertEquals("TestToCamel", $this->test_subject->snakeToCamel());
	}
	
	public function testCamelToSnake() {
		$this->test_subject = new StringBuilder("testToCamel");
		$this->assertEquals("test_to_camel", $this->test_subject->camelToSnake());
	}
	
}