<?php
namespace StructuredPHP\Common\Type;

/**
 * Basic object type of all classes
 * 
 * @author Haihao
 *
 */
abstract class Object {
	
	/**
	 * @var array
	 */
	protected $data;
	
	
	/**
	 * convert target object to array
	 * 
	 * @param string $include_private
	 * @return array
	 */
	public function toArray($exclude = array(), $referesh = false) {
		if ( empty($this->data) || $referesh ) {
			$reflect = new \ReflectionObject($this);
			$properties = $reflect->getProperties();
			$data = array();
			foreach ($properties as $property) {
				$property->setAccessible(true);
				$key = $property->getName();
				if(!in_array($key, $exclude) && $key != "data") { //ignore exclude
					$value = $property->getValue($this);
					$value = is_subclass_of($value, "Foundation\\Common\\Type\\Object") ? $value->toArray() : $value;
					$data[$key] = $value;
				}
			}
			$this->data = $data;
		}		
		return $this->data;
	}
	
	/**
	 * return the full name of the class
	 * 
	 * @param string $full
	 */
	public function getClassName($full = false) {
		$reflect = new \ReflectionObject($this);
		return $full ? $reflect->getName() : $reflect->getShortName();
	}
	
	/**
	 * check if object a equals object b
	 * 
	 * by default it use == operator
	 * 
	 * @param unknown $target
	 * @return boolean
	 */
	public function equals($target){
		return $this == $target;
	}
}