<?php
class ModelBlog{

    // AFFICHAGE DES POSTS
public function getAllPosts()
{
    $db = $this->dbConnect();
    $req = $db->query("SELECT * FROM posts WHERE posted ='1' ORDER BY date ASC");
    return $req;
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
?>
