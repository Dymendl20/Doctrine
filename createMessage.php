<?php
// createMessage.php
require_once "bootstrap.php";

use Imie\Entity\Message;

$newMessage = $argv[1];

try
{
    $message = new Message();
    $message->setName($newMessage);

    $entityManager->persist($message);
    $entityManager->flush();

    echo "Created Product with ID " . $message->getId() . "\n";
}
catch(Exception $e)
{
    echo $e->getMessage();
}