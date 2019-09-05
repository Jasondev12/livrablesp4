<?php
class ModelEPost{
    // RECUPERATION DE TOUS LES POSTS
function get_post(){

    $db = $this->dbConnect();
    $req = $db->query ("
    SELECT *
    FROM posts
    ");

    $result = $req;
    return $result;
}
    
// CONNEXION A LA BDD
public function dbConnect()
{
    try
    {
        require('models/include/connectd.php');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
  }
}
