<?php
namespace StructuredPHP\Common\Util\Collection\Interfaces;

use StructuredPHP\Common\Collections\Interfaces\ICollection;

/**
 * Sorter Interface
 * 
 * All sorter needs to implement this interface 
 *  
 * @author haihao
 *
 */
interface ISorter {
	public function doSort(ICollection $collection);
}