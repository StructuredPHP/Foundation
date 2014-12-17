<?php
namespace StructuredPHP\Mapper;

use StructuredPHP\Common\Type\Object;
use StructuredPHP\Mapper\Interfaces\IMapper;

/**
 * Map an key=>value array to an object
 * 
 * @author haihao
 *
 */
class ArrayObjectMapper extends Object implements IMapper {
	
	/* (non-PHPdoc)
	 * @see \StructuredPHP\Mapper\Interfaces\IMapper::map()
	 */
	public function map($from, $to) {
		$reflect_to = new \ReflectionObject($to);
		if(is_array($from)){
			foreach ($from as $key => $value) {
				$to_property = $reflect_to->getProperty($key);
				if ($to_property) {
					$to_property->setAccessible(true);
					$to_property->setValue($to, $value);
				}
			}
		}
		return $to;
	}

}