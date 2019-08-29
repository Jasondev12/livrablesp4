<?php
// MODELE DEFINIT LES FONCTIONS APPELES DANS NOS VIEWS
function email_taken($email){
    require('models/include/connectd.php');
    $e = ['email'   =>  $email];
    $sql = "SELECT * FROM admins WHERE email = :email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);
    return $free;
}

function token($length){
    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
}

function add_modo($name,$email,$role,$token){
    require('models/include/connectd.php');

    $m= [
        'name'      =>  $name,
        'email'     =>  $email,
        'token'     =>  $token,
        'role'      =>  $role
    ];

    $sql = "INSERT INTO admins(name,email,token,role) VALUES(:name,:email,:token,:role)";
    $req = $db->prepare($sql);
    $req->execute($m);

    $subject = "Modo sur le blog";
    $message = '
        <html lang="en" style="font-family: sans-serif;">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                Voici votre identifiant et code unique à insérer sur <a href="http://http://localhost/Blogp4/controllers/.php?page=login">cette page</a>:
                <br/>Identifiant: '.$email.'
                <br/>Mot de passe: '.$token.'
                <br/>Vous êtes: '.$role.'
                <br/><br/>Après avoir inséré ces informations, vous devrez choisir un mot de passe.
            </body>
        </html>
    ';
    
    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=UTF-8\r\n";
    $header .= 'From: no-reply@jmaes.fr.com' . "\r\n" . 'Reply-To: maesjasonpro@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($email,$subject,$message,$header);

}

function get_modos(){
    require('models/include/connectd.php');
    $req = $db->query("
        SELECT * FROM admins
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}
