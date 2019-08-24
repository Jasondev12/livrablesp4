<?php
class ModelEPost{
function get_post(){

    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');  
    $req = $db->query ("
    SELECT *
    FROM posts

    ");

    $result = $req;
    return $result;
}


}