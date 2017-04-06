<?php
define("BASE_DIR", __DIR__ ."/");//DIR part de l'index Doctrine master

require_once "bootstrap.php";
use Imie\Entity\Product;

if(isset($_POST['submit']))
{
    $productName = $_POST['productName'];
    $productImage = $_POST['productImage'];
    $image = $_FILES['fileToUpload'];

    include(BASE_DIR."/asset/php/upload.php");

    try
    {
        $product = new Product();
        $product->setName($productName);
        $product->setImage($productImage);

        $entityManager->persist($product);
        $entityManager->flush();

        $msg = "Created Product with ID " . $product->getId() . "\n";
    }
    catch(Exception $e)
    {
        $e->getMessage();
    }
}

if(isset($_POST['show']))
{
    $productRepository = $entityManager->getRepository("Imie\Entity\Product");
    $products = $productRepository->findAll();

    $tableau = '<table border="2" cellpading="5px" cellspacing="5px">';
    $tableau .= "<th>ID</th>";
    $tableau .= '<th>Nom</th>';
    $tableau .= '<th>Image</th>';
    $tableau .= '<th>Supprimer</th>';

    foreach($products as $product)
    {
        $tableau .= '<tr>';
        $tableau .= '<td>'.$product->getId().'</td>';
        $tableau .= '<td>'.$product->getName().'</td>';
        $tableau .= '<td><img src="asset/images/'.$product->getImage().'" alt="'.$product->getImage().'" height="150" width="150"></td>';
        $tableau .= '<form action="#" method="post">';
        $tableau .= '<td><input type="hidden" name="productId" value="'.$product->getId().'" />';
        $tableau .= '<input type="submit" name="del" value="Delete" />';
        $tableau .= '</form></td>';
        $tableau .= '</tr>';

    }
    $tableau .= '</table>';
}

if(isset($_POST['del']))
{
    $productRepository = $entityManager->getRepository("Imie\Entity\Product");
    $oneProduct = $productRepository->findOneBy(['id' => $_POST['productId']]);

    $entityManager->remove($oneProduct);
    $entityManager->flush();
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <style>
            p
            {
                color: blue;
            }
            h1
            {
                color: red;
            }
            body
            {
                background-color: #ad6;
                margin: auto;
            }
        </style>
</head>
<body>
    <section>
        <article>
        <center><strong><i><h1>DOCTRINE 2- ORM</h1></i></strong></center><br><br>
            <center><form action="#" method="post" enctype="multipart/form-data">
                <p>Nom du nouveau produit<br><input type="text" name="productName" required /></p>
                <p>Nouveau nom de l'image<br><input type="text" name="productImage" required /></p>
                <p>Image à uploader<br><input type="file" name="fileToUpload" /></p>
                <input type="submit" name="submit" value="Submit" />
            </form></center>
        </article>
        <article>
            <h2>Show product:</h2>
            <form action="#" method="post">
                <input type="submit" name="show" value="show" />
            </form>
        </article>
        <article>
            <?php if(isset($msg)){echo $msg;} ?>
        </article>
        <?php if(isset($tableau)){echo $tableau;}?>
    </section>
</body>
</html>
