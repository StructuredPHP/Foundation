<?php
namespace StructuredPHP\Tests\Common\Collections;

use StructuredPHP\Common\Collections\Collection;
use StructuredPHP\Tests\Objects\SimpleObject;
use StructuredPHP\Common\Util\Filter\NullItemFilter;
use StructuredPHP\Tests\Objects\SimpleSorter;

class SimpleCollectionTest extends \PHPUnit_Framework_TestCase {
	
	protected $test_subject;
	
	/* (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUp()
	 */
	protected function setUp() {
		$this->test_subject = new Collection();
		$a = new SimpleObject();
		$b = new SimpleObject();
		$c = new SimpleObject();
		$a->setName("a");
		$b->setName("b");
		$c->setName("c");
		$this->test_subject->add($a);
		$this->test_subject->add($c); 
		$this->test_subject->add($b);
	}
	
	public function testCount() {
		$count = $this->test_subject->count();
		$c = 0;
		foreach ($this->test_subject as $item) {
			$c++;
		}
		$this->assertEquals($count, $c);
	}
	
	public function testGetData() {
		$data = $this->test_subject->getData();
		$this->assertEquals(3, sizeof($data));
	}
	
	public function testRemove() {
		$this->test_subject->remove(0);
		$count = $this->test_subject->count();
		$this->assertEquals(2, $count);
		$this->test_subject->clear();		
		$count = $this->test_subject->count();
		$this->assertEquals(0, $count);
	}
	
	public function testNullItemFilter() {	
		$this->test_subject->add(null);
		$count = $this->test_subject->count();
		$this->assertEquals(4, $count);
		
		$this->test_subject->filter(new NullItemFilter());
		$this->assertEquals(3, $this->test_subject->count());
	}
	
	public function testSimpleSorter() {
		$object = $this->test_subject->get(1);
		$this->assertEquals("c",$object->getName());
		
		$this->test_subject->sort(new SimpleSorter());
		$object = $this->test_subject->get(1);
		$this->assertEquals("b",$object->getName());
	}
	

	
}