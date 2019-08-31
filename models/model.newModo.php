<?php

// VERIFICATION SI MODO VIA EMAIL ET TOKEN
function is_modo($email,$token){
    require('models/include/connectd.php');
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
