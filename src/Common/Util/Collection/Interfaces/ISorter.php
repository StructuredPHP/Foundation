<?php
namespace StructuredPHP\Common\Util\Collection\Interfaces;

/**
 * Sorter Interface
 * 
 * All sorter needs to implement this interface 
 *  
 * @author haihao
 *
 */
interface ISorter {
	
	public function doSort($collection);
	
}