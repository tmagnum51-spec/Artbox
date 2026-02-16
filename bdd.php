<?php
  // On se connecte à MySQL
try
{
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=artbox;charset=utf8',
    'root',
    ''
    
);
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getmessage());
}

?>


