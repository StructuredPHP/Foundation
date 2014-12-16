<?php
namespace StructuredPHP\Common\Collections;

use StructuredPHP\Common\Type\Object;
use StructuredPHP\Common\Interfaces\Filterable;
use StructuredPHP\Common\Util\Collection\Interfaces\IFilter;
use StructuredPHP\Common\Interfaces\Sortable;
use StructuredPHP\Common\Util\Collection\Interfaces\ISorter;
use StructuredPHP\Common\Collections\Interfaces\ICollection;

/**
 * Collection
 * 
 * @author haihao
 *
 */
class Collection extends Object implements ICollection, Filterable, Sortable {
	
	public function add($obj) {
		$this->data[] = $obj;
		return $this;
	}
	
	public function remove($index) {
		unset($this->data[$index]);
		return $this;
	}
	
	public function clear() {
		$this->data = array();
		return $this;
	}
	
	public function count() {
		return sizeof($this->data);
	}
	
	public function getData() {
		return $this->data;
	}
	
	public function setData($data) {
		$this->data = $data;
		return $this;
	}
	
	/* (non-PHPdoc)
	 * @see \StructuredPHP\Common\Interfaces\Filterable::filter()
	 */
	public function filter(IFilter $filter) {
		$filter->doFilter($this);
		return $this;
	}
	
	/**
	 * 
	 * @param ISorter $sorter
	 * @return \StructuredPHP\Common\DataStructure\Collection
	 */
	public function sort(ISorter $sorter){
		$sorter->doSort($this);
		return $this;
	}


}