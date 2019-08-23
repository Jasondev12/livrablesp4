<?php
class ModelPost{
public function getPost($postId)
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

public function getComments($postId)
{
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY date DESC');
    $comments->execute(array($postId));

    return $comments;
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