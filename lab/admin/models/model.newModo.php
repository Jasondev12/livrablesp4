<?php

function is_modo($email,$token){
    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');  

    $a = [
        'email' =>  $email,
        'token' =>  $token
    ];
    $sql = "SELECT * FROM admins WHERE email=:email AND token=:token";
    $req= $db->prepare($sql);
    $req->execute($a);
    return $req->rowCount($sql);
}
?>