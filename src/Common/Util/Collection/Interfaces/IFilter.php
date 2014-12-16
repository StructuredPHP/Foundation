<?php
namespace StructuredPHP\Common\Util\Collection\Interfaces;

use StructuredPHP\Common\Collections\Interfaces\ICollection;

/**
 * Interface Filter
 * 
 *  
 * @author haihao
 *
 */
interface IFilter {
	
	/**
	 * Filter the target collection based on certain rule
	 * 
	 * @param ICollection $collection
	 * @return array
	 */
	public function doFilter(ICollection $collection);
}