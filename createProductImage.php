<?php
require ("bootstrap.php");

use Imie\Entity\ProductImage;

$idImage = $argv[1];
$nomProduct = $argv[2];

try{
	$imageRepo = $entityManager->getRepository("Imie\Entity\Image");
	$image = $imageRepo->findOneBy(["id" => $argv[1]]);

	$productImage = new ProductImage();
	$productImage->setName($argv[2]);
	$productImage->setImage($image);

	$entityManager->persist($productImage);
	$entityManager->flush();
}
catch(Exception $i){
	echo $i->getMessage();


}
