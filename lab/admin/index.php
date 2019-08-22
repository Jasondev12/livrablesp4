<?php

require('controllers/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signin') {
       signin();
    }
    elseif ($_GET['action'] == 'addmodo') {
        addmdo();
    }elseif($_GET['action'] == 'lista'){
       lista_modif();
    }elseif($_GET['action'] == 'addarticle'){
        addarticle();
    }elseif($_GET['action'] == 'logout'){
        logout();
    }elseif($_GET['action'] == 'quit'){
        quit();
}
}
else {
    dashboard();
}