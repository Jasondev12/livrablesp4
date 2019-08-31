<?php
// INDEX GERE LE LIENS DES PAGES APPELES
require('controllers/controller.php');
session_start();

if(isset($_GET['client'])){
    switch ($_GET['client']) {
            case 'listPosts':
            listPosts();
            break;
            case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
            }
            else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
            case  'blog' :
            blog();
            break;
            case 'apropos' :
            apropos();
            break;
            case 'ML' :
            lmentions();
            break;
            case 'PDC':
            podc();
            break;
            case 'signaler' :
            signaler();
            break;
            default:
            notFound();
            break;
    }

}elseif(isset($_GET['admin'])){
    if(isset($_SESSION['id'])){
        switch ($_GET['admin']) {
            case 'dashboard' :
            dashboard();
            break;
            case 'signin' :
            signin();
            break;
            case 'addmodo' :
            addmdo();
            break;
            case 'lista' :
            lista_modif();
            break;
            case 'addpost' :
            addarticle();
            break;
            case 'logout' :
            logout();
            break;
            case 'quit' :
            quit();
            break;
            case 'upost' :
            upost();
            break;
            case 'options' :
            options();
            break;
        }
            }else{
            switch ($_GET['admin']) {
            case 'newmodo' :
            newmodo();
            break;
            case 'password' :
            password();
            break;

            default :
            signin();
            }
        }
}else{
    listPosts();
}
