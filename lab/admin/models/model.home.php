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
        SELECT  *
        FROM comments
        JOIN posts
        ON id_post = posts.id
        WHERE seen = '0'
        ORDER BY date ASC
    ");

    $results = [];
    while($rows = $req->fetch()){
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