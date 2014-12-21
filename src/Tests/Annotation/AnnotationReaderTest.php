<?php
namespace StructuredPHP\Tests\Annotation;

use StructuredPHP\Annotations\Util\AnnotationReader;
use StructuredPHP\Tests\Objects\SimpleObject;
use StructuredPHP\Tests\Objects\Annotation\SimpleAnnotation;

class AnnotationReaderTest extends \PHPUnit_Framework_TestCase {
	
	protected $test_subject;
	
	public function setUp() {
		$this->test_subject = new AnnotationReader(new SimpleObject());
	}
	
	public function testGetClassAnnotations() {
		$annotations = $this->test_subject->getClassAnotations();
		foreach($annotations as $annotation) {
			if($annotation instanceof SimpleAnnotatoin) {
				$this->assertEquals("test",$annotation->getName());
				$this->assertEquals("class",$annotation->getType());
			}
		}
	}
	
	public function testGetPropertyAnnotations() {
		$annotations = $this->test_subject->getPropertiesAnnotations();
		$name_annotations = $annotations['name'];
		foreach($name_annotations as $annotation) {
			if($annotation instanceof SimpleAnnotatoin) {
				$this->assertEquals("simple",$annotation->getName());
				$this->assertEquals("property",$annotation->getType());
			}
		}
	}
	
	public function testGetMethodAnnotations() {
		$annotations = $this->test_subject->getMethodsAnnotations();
		$name_annotations = $annotations['getName'];
		foreach($name_annotations as $annotation) {
			if($annotation instanceof SimpleAnnotatoin) {
				$this->assertEquals("a",$annotation->getName());
				$this->assertEquals("method",$annotation->getType());
			}
		}
	}
	
}