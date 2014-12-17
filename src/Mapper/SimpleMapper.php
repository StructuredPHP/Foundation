<?php
namespace StructuredPHP\Mapper;

use StructuredPHP\Common\Type\Object;
use StructuredPHP\Mapper\Interfaces\IMapper;

/**
 * Map Object A to B
 * 
 * @author haihao
 *
 */
class SimpleMapper extends Object implements IMapper {
	
	/**
	 * get reflection object
	 * 
	 * @param $object
	 * @return \ReflectionObject
	 */
	protected function getReflectObject($object) {
		return new \ReflectionObject($object);
	}
	
	
	/* (non-PHPdoc)
	 * @see \StructuredPHP\Mapper\Interfaces\IMapper::map()
	 */
	public function map($from, $to) {
		
		$ref_from = $this->getReflectObject($from);
		$ref_to = $this->getReflectObject($to);
				
		foreach($ref_from->getProperties() as $property) {
			$to_property = $ref_to->getProperty($property->getName());
			if ($to_property) {
				$property->setAccessible(true);
				$to_property->setAccessible(true);
				$value = $property->getValue($from);
				$to_property->setValue($to, $value);
			}			
		}
		
		return $to;
	}

}