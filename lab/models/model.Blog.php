
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
        $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
}
?>