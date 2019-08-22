<?php
function getPosts()
{
    $db = dbConnect();
    $req = $db->query("SELECT * FROM posts WHERE posted ='1' ORDER BY date ASC LIMIT 0, 2");

    return $req;
}
function getAllPosts()
{
    $db = dbConnect();
    $req = $db->query("SELECT * FROM posts WHERE posted ='1' ORDER BY date ASC");

    return $req;
}
function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY date DESC');
    $comments->execute(array($postId));

    return $comments;
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
