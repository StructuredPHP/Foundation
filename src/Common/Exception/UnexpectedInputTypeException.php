<?php
namespace StructuredPHP\Common\Exception;

use StructuredPHP\Common\Enums\ExceptionCode;

/**
 * Unexpected Input Type Exception
 * 
 * @author haihao
 *
 */
class UnexpectedInputTypeException extends \Exception {
	
	const MESSAGE_TEMPLATE = "expected input class [%expected%] actual class [%actual%]";
	
	public function __construct($expected, $actual) {
		$message = str_replace("%actual%", $actual, str_replace("%expected%", $expected, self::MESSAGE_TEMPLATE));
		parent::__construct($message, ExceptionCode::STRUCTURE_ERROR);
	}
	
}