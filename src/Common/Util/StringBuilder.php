<?php
namespace StructuredPHP\Common\Util;

use StructuredPHP\Common\Type\Object;

/**
 * String Builder
 * 
 * Provides a set of function which helps processing
 * 
 * @author haihao
 * 
 */
class StringBuilder extends Object {
	
	protected $string;
	
	public function __construct($string) {
		$this->string = $string;
	}
	
	/**
	 * convert snake to camel case
	 * 
	 * @return string
	 */
	public function snakeToCamel() {
		$this->string = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string)));
		return $this->string;
	}
	
	/**
	 * convert camel to snake case
	 * 
	 * @return string
	 */
	public function camelToSnake() {
		$this->string = preg_replace_callback('/[A-Z]/', create_function('$match', 'return "_" . strtolower($match[0]);'), $this->string);
		return $this->string;
	}
	
}