<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;


/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('', __DIR__.'/../src');



AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
