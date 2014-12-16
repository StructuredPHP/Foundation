<?php
namespace StructuredPHP\Common\Util\Filter;

use StructuredPHP\Common\Util\Interfaces\IFilter;

/**
 * Remove null item from a collection
 * 
 * @author haihao
 *
 */
class NullItemFilter implements IFilter {
	
	/* (non-PHPdoc)
	 * @see \StructuredPHP\Common\Util\Collection\Interfaces\IFilter::doFilter()
	 */
	public function doFilter($collection) {
		$data = $collection->getData();
		$filtered_data = array();
		foreach($data as $d) {
			if ($d) {
				$filtered_data[] = $d;
			}
		}
		$collection->setData($filtered_data);
		return $collection;
	}
}