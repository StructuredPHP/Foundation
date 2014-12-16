<?php
namespace StructuredPHP\Common\Interfaces;

/**
 * Interface which supports compare
 * 
 * @author haihao
 *
 */
interface Comparable {
	
	/**
	 * if Object A
	 * 
	 * return 0 if equal
	 * return 1 if greater
	 * return -1 if smaller
	 * 
	 * @param Comparable $target
	 * @return integer
	 */
	public function compare(Comparable $target);
	
}