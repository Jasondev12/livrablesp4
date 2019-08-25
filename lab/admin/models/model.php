<?php



function dbConnect()
{
    try
    {
       require('models/include/connect.php');        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
