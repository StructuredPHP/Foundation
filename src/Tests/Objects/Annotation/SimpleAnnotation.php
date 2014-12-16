<?php
namespace StructuredPHP\Tests\Objects\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
class SimpleAnnotation extends Annotation {
	
	protected $name;
	
	protected $type;
	
	public function getName() {
		return $this->name;
	}
	
	public function getType() {
		return $this->type;
	}
}