<?php

require_once "bootstrap.php";

use Imie\Entity\Message;

$newMessage = $argv[1];

try
{

    $messageRepository = $entityManager->getRepository("Imie\Entity\Message");
    $oneMessage = $messageRepository->findOneBy(['id' => $newMessage]);

    $entityManager->remove($oneMessage);
    $entityManager->flush();

}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>