<?php
class ModelBlog{
public function getAllPosts()
{
    $db = $this->dbConnect();
    $req = $db->query("SELECT * FROM posts WHERE posted ='1' ORDER BY date ASC");
    return $req;
}
    
public function dbConnect()
{
    try
    {
        require('models/include/connect.php');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
}
?>
