<?php
namespace StructuredPHP\Annotation\Util;

use StructuredPHP\Common\Type\Object;
use Doctrine\Common\Annotations\AnnotationReader as DoctrineReader;

/**
 * 
 * @author haihao
 *
 */
class AnnotationReader extends Object {
	
	protected $target;
	
	protected $reader;
	
	public function __construct($target) {
		$this->target = $target;
		$this->reader = new DoctrineReader();
	}
			
	/**
	 * get class annotations
	 * 
	 * @return array
	 */
	public function getClassAnotations() {
		$class = new \ReflectionClass($this->target);
		return $this->reader->getClassAnnotations($class);
	}
	
	/**
	 * get methods annotations
	 * 
	 * @return array
	 */
	public function getMethodsAnnotations() {
		$reflect = new \ReflectionObject($this->target);
		$result  = array();
		foreach($reflect->getMethods() as $method) {
			$result[$method->getName()] = $this->reader->getMethodAnnotations($method);
		}
		return $result;
	}
	
	/**
	 * 
	 * @return multitype:Ambigous <multitype:, multitype:Ambigous <\Doctrine\Common\Annotations\mixed, boolean, unknown> >
	 */
	public function getPropertiesAnnotations() {
		$reflect = new \ReflectionObject($this->target);
		$result  = array();
		foreach($reflect->getProperties() as $property) {
			$result[$property->getName()] = $this->reader->getPropertyAnnotations($property);
		}
		return $result;
	}
}