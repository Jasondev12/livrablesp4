<?php

 function is_admin($email,$password)
{
    $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');  
    
    $a = [
        'email'     =>  $email,
        'password'  =>  sha1($password)
    ];
    $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount();
    if($exist == 1){
        $user_info = $req->fetch();
        $_SESSION['id'] = $user_info['id'];
        $_SESSION['admin'] = $user_info['name'];
    }
    
}


?>
