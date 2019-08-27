<?php

function inTable($table){
   require('models/include/connectd.php');    $query = $db->query("SELECT COUNT(id) FROM $table");
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
   require('models/include/connectd.php');
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

function get_comments_signaler(){
    require('models/include/connectd.php');
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
         WHERE comments.seen = '2'
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
       require('models/include/connectd.php');        
       return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
