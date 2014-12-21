<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require_once 'vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, "loadClass"));
