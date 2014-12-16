<?php
namespace StructuredPHP\Common\Collections;

use StructuredPHP\Common\Interfaces\Filterable;
use StructuredPHP\Common\Util\Collection\Interfaces\IFilter;
use StructuredPHP\Common\Interfaces\Sortable;
use StructuredPHP\Common\Util\Collection\Interfaces\ISorter;
use StructuredPHP\Common\Collections\Interfaces\ICollection;
use StructuredPHP\Common\Type\AbstractIterator;

/**
 * Collection
 * 
 * @author haihao
 *
 */
class Collection extends AbstractIterator implements ICollection, Filterable, Sortable {
	
	/**
	 * (non-PHPdoc)
	 * @see \StructuredPHP\Common\Collections\Interfaces\ICollection::add()
	 */
	public function add($obj) {
		$this->data[] = $obj;
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \StructuredPHP\Common\Collections\Interfaces\ICollection::remove()
	 */
	public function remove($index) {
		unset($this->data[$index]);
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \StructuredPHP\Common\Collections\Interfaces\ICollection::clear()
	 */
	public function clear() {
		$this->data = array();
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \StructuredPHP\Common\Collections\Interfaces\ICollection::count()
	 */
	public function count() {
		return sizeof($this->data);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \StructuredPHP\Common\Collections\Interfaces\ICollection::getData()
	 */
	public function getData() {
		return $this->data;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \StructuredPHP\Common\Collections\Interfaces\ICollection::setData()
	 */
	public function setData($data) {
		$this->data = $data;
		return $this;
	}
	
	/**
	 * 
	 * (non-PHPdoc)
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