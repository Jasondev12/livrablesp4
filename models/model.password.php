<?php
class ModelPass{
// MAJ DU PASSWORD
function update_password($password){
    require('models/include/connectd.php');    
    $password_hash = hash('sha256',$password);
    $p = [
        'password'  => $password_hash,
        'session'   =>  $_SESSION['admin']
    ];

    $sql = "UPDATE admins SET password = :password WHERE email=:session";
    $req = $db->prepare($sql);
    $req->execute($p);
    }
}
?>
