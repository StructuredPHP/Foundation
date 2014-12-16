<?php
namespace StructuredPHP\Common\Interfaces;

use StructuredPHP\Common\Util\Collection\Interfaces\IFilter;

/**
 * 
 * @author haihao
 *
 */
interface Filterable {
	
	public function filter(IFilter $filter);
	
}