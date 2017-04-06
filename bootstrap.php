<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Load composer autoload
require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Imie/Entity"),$isDevMode);

// Database configuration parameters
// Database configuration parameters
$conn = null;
require_once("conf.php");
// Obtaining the entity manager from a factory
$entityManager = EntityManager::create($conn, $config);