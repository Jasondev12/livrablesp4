<?php

// VERIFICATION SI 1 UTILISATEUR EST ADMIN VIA SON EMAIL ET PASS
 function is_admin($email,$password)
{
    require('models/include/connectd.php');  
    $password_hash = hash('sha256',$password);
    $a = [
        'email'     =>  $email,
        'password'  =>  $password_hash
    ];
    $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount();
    if($exist == 1){
        $user_info = $req->fetch();
        $_SESSION['id'] = $user_info['id'];
        $_SESSION['admin'] = $user_info['email'];
    }
}
?>
