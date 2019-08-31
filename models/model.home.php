<?php

// COMPTE LE NOMBRE D'ID DANS UNE TABLE
function inTable($table){
   require('models/include/connectd.php');    
   $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

// TRAITEMENT DES COULEURS DU DASHBOARD
function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}

// RECUPERATION DES COMMENTAIRES
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

// RECUPERE LES COMMENTAIRES SIGNALES
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

 // CONNEXION A LA BDD
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
