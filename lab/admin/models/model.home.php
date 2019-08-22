<?php

function inTable($table){
    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}

function get_comments(){
    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');

    $req = $db->query("
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.seen = '0'
        ORDER BY comments.date ASC
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}



function dbConnect()
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