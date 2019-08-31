<?php

class ModelPost{
   
    // RECUPERE UN POST
    public function getPost($postId)
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}
    // INSERTION D'1 COMMENTAIRE DANS LA BDD
function comment($name, $email,$comment){
    $db = $this->dbConnect();  
    $c = array(
        'name'       => $name,
        'email'      => $email,
        'comment'    => $comment,
        'post_id'    =>$_GET["id"]
    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);
}
    
    // RECUPERATION DES COMMENTAIRES DU POST
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
