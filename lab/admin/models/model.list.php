<?php

function get_post(){

    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');  
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

function edit($title,$content,$posted,$id){

    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');  

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}
