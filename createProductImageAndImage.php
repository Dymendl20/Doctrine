<?php
require ("bootstrap.php");

use Imie\Entity\ProductImage;
use Imie\Entity\Image;

try{
	$product = new ProductImage();
	$product->setImage(new Image());
	$product->setName($argv[1]);
	$product->getImage()->setNameImage($argv[2]);

	$entityManager->persist($product);
	$entityManager->flush();
}
catch(Exception $e){
	echo $e->getMessage();
}