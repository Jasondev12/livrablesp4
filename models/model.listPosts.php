<?php
class ModelLPost{

    // RECUPERATION DES 2 DERNIERS POSTS PUBLIES
public function getPosts()
{
    $db = $this->dbConnect();
    $req = $db->query("SELECT * FROM posts WHERE posted ='1' ORDER BY date ASC LIMIT 0, 2");
    return $req;
}

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
