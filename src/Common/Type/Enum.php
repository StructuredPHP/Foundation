<?php
namespace StructuredPHP\Common\Type;

/**
 * Abstract Enum Class
 * 
 * @author haihao
 *
 */
abstract class Enum {	
		
	/**
	 * convert Enum class to Array
	 * 
	 * @return multitype:
	 */
	public static function toArray()
	{
		$reflect = new \ReflectionClass(get_called_class());
		return $reflect->getConstants();
	}
	
	/**
	 * check if value is valid
	 * 
	 * @param $value
	 */
	public static function valid($value)
	{
		return in_array($value, self::toArray());
	}
}