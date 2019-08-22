<?php


function quit(){
    header('Location: ../index.php');
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
    require('views/viewList.php');
}
function addarticle(){
    require('models/model.addpost.php');
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