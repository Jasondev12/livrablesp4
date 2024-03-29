<?php
class ModelPostd{
// RECUPERATION DE TOUS LES POSTS ET LE CREATEUR DU POST
function get_post(){
   require('models/include/connectd.php');    
   $req = $db->query ("
    SELECT  posts.id,
            posts.title,
            posts.image,
            posts.date,
            posts.content,
            posts.posted,
            admins.name
    FROM posts
    JOIN admins
    ON posts.writer = admins.email
    WHERE posts.id = '{$_GET['id']}'
    ");

    $result = $req->fetchObject();
    return $result;
}

// PERMET D'EDITER LES POSTS
function edit($title,$content,$posted,$id){
   require('models/include/connectd.php');    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);
    }
}
?>
