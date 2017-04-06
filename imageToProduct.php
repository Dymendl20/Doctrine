<?php
require_once("bootstrap.php");

$productId = $argv[1];
$imageName = $argv[2];


try
{
    $productRepository = $entityManager->getRepository("Imie\Entity\Product");
    $product = $productRepository->find($productId);

    $product->setImage($imageName);

    $entityManager->persist($product);
    $entityManager->flush();
    echo "Image sucessfuly added";
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>