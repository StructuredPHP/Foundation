<?php
namespace StructuredPHP\Tests\Objects;

use StructuredPHP\Common\Util\Interfaces\ISorter;
use StructuredPHP\Common\Type\Object;

class SimpleSorter extends Object implements ISorter {
	
	/* (non-PHPdoc)
	 * @see \StructuredPHP\Common\Util\Interfaces\ISorter::doSort()
	 */
	public function doSort($collection) {
		// TODO: Auto-generated method stub
		$data = $collection->getData();
		usort($data, array($this->getClassName(true),"sortByName"));
		$collection->setData($data);
		return $this;
	}
	
	public static function sortByName($a, $b) {
		return strcasecmp($a->getName(), $b->getName());
	}

}