<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;


/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
//'FOS' => __DIR__.'/../vendor/bundles',
AnnotationRegistry::registerLoader(
    array($loader, 'loadClass')
);
//Rajoute par RKO le 23/03/2015 :
/*
$loader->registerNamespaces(array(
    // ...
    'FOS' => __DIR__.'/../vendor/bundles',
));

*/
return $loader;
