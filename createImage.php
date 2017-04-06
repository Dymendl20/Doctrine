<?php
require ("bootstrap.php");

use Imie\Entity\Image;

$nomImage = $argv[1];//mettra toto dans image
try{
	$image = new Image();
	$image-> setNameImage($nomImage);//prends en paramètre le nom de l'image qu'on récupère new Image()

	//Pour envoyer dans la bd on use entityManager
	$entityManager-> persist($image);//
	$entityManager-> flush();//
}
catch(Exception $e){
	echo $e-> getMessage();
}

?>