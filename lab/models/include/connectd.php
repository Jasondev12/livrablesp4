<?php
// CONNEXION A LA BDD
try
{
    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');  
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
?>