<?php
// createProduct.php
require_once "bootstrap.php";

use Imie\Entity\Product;

$newProductName = $argv[1];
$newProductImage = $argv[2];

try
{
    $product = new Product();
    $product->setName($newProductName);
    $product->setImage($newProductImage);

    $entityManager->persist($product);
    $entityManager->flush();

    echo "Created Product with ID " . $product->getId() . "\n";
}
catch(Exception $e)
{
    echo $e->getMessage();
}