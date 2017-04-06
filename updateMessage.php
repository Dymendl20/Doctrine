<?php
require_once("bootstrap.php");

$messageId = $argv[1];
$messageName = $argv[2];


try
{
    $messageRepository = $entityManager->getRepository("Imie\Entity\Message");
    $message = $messageRepository->findOneBy(["id" => $messageId]);

    $message->setName($messageName);

    $entityManager->persist($message);
    $entityManager->flush();
    echo "Updated";
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>