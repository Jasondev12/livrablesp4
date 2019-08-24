<?php

function update_password($password){
    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');    
    $p = [
        'password'  =>  sha1($password),
        'session'   =>  $_SESSION['admin']
    ];

    $sql = "UPDATE admins SET password = :password WHERE email=:session";
    $req = $db->prepare($sql);
    $req->execute($p);

}
?>