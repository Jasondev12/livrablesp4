<?php

require('controllers/controller.php');
session_start();


if(isset($_SESSION['id'])){
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signin') {
       signin();
    }
    elseif ($_GET['action'] == 'addmodo') {
        addmdo();
    }elseif($_GET['action'] == 'lista'){
       lista_modif();
    }elseif($_GET['action'] == 'addpost'){
        addarticle();
    }elseif($_GET['action'] == 'logout'){
        logout();
    }elseif($_GET['action'] == 'quit'){
        quit();
    }elseif($_GET['action'] == 'upost'){
    upost();
    }elseif($_GET['action']== 'delete'){
        delete();
    }
   
}
else {
    dashboard();
}
}else{
    if(isset($_GET['action'])){
    if($_GET['action'] == 'newmodo'){
        newmodo();
    }elseif($_GET['action'] == 'password'){
        password();
    }
}else{
    signin();
}
}