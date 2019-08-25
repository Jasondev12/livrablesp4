<?php
function upost(){
    require('models/model.post.php');
    require('views/viewPost.php');
}
function password(){
    require('models/model.password.php');
    require('views/viewPassword.php');
}
function newmodo(){
    require('models/model.newModo.php');
    require('views/viewModo.php');
}
function quit(){
    header('Location: ../index.php');
}
function options(){
    require('models/model.options.php');

}
function logout()
{

    session_start();
    session_destroy();

    header('Location: ../index.php');
}
function addmdo(){
    require('models/model.addmdo.php');
    require('views/viewAddModo.php');
}
function lista_modif(){
    require('models/model.list.php');
    $model = new ModelEPost();
    $result = $model->get_post();
    require('views/viewList.php');
}
function addarticle(){
    require('models/model.addpost.php');
    $model = new ModelAPost();
    
    require('views/viewAddArticle.php');
}
function dashboard(){
    require('models/model.home.php');
    require('views/viewHome.php');
}
function signin(){
    require('models/model.signin.php');
    require('views/viewLogin.php');
}
