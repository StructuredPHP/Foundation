<?php
namespace StructuredPHP\Common\Collections\Interfaces;

/**
 * Collection Interfaces
 * 
 * @author haihao
 *
 */
interface ICollection extends \Iterator {
	
	public function add($obj);
		
	public function remove($index);
	
	public function clear();
	
	public function count();

	public function getData();
	
	public function setData($data);
}