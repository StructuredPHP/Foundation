<?php
namespace StructuredPHP\Tests\Common\Util;

use StructuredPHP\Common\Util\CountryFinder;
class CountryFinderTest extends \PHPUnit_Framework_TestCase {

	protected $test_subject;
	
	public function setUp() {
		$this->test_subject = new CountryFinder();
	}
	
	public function testFindCountryByCode() {
		$this->assertEquals("China", $this->test_subject->getCountryNameByCode("CN"));
	}
	
	public function testFindCountryCodeByName() {
		$this->assertEquals("AU", $this->test_subject->getCountryCodeByName("Australia"));
	}
	
}