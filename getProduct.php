<?php
// show_product.php <id>
require_once "bootstrap.php";

$id = $argv[1];
$productRepository = $entityManager->getRepository("Imie\Entity\Product");
$product = $productRepository->find($id);
if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo $product->toString();
?>