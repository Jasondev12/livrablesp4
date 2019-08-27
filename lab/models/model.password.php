<?php

function update_password($password){
    require('models/include/connectd.php');    
    $p = [
        'password'  =>  sha1($password),
        'session'   =>  $_SESSION['admin']
    ];

    $sql = "UPDATE admins SET password = :password WHERE email=:session";
    $req = $db->prepare($sql);
    $req->execute($p);

}
?>
