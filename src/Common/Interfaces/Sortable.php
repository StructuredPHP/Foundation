<?php
namespace StructuredPHP\Common\Interfaces;

use StructuredPHP\Common\Util\Collection\Interfaces\ISorter;

/**
 * Define if the object is sort able
 * 
 * @author haihao
 *
 */
interface Sortable {
	
	/**
	 * Sort the target collections
	 * 
	 * @param ISorter $sorter
	 */
	public function sort(ISorter $sorter);
}