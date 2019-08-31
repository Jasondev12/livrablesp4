<?php require_once('models/model.topbar.php'); ?>
<nav class="blue-grey darken-4">
    <div class="container">
        <div class="nav-wrapper">
            <a href="?admin=dashboard" class="brand-logo">Administration</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="?admin=dashboard"><i class="material-icons">dashboard</i></a></li>
                <?php
                if(admin()==1){
                ?>
                <li><a href="?admin=addpost"><i class="material-icons">edit</i></a></li>
                <li><a href="?admin=lista"><i class="material-icons">view_list</i></a></li>
                <li><a href="?admin=addmodo"><i class="material-icons">settings</i></a></li>
                <?php
                }
                ?>
                <li><a href="?admin=quit">Quitter</a></li>
                <li><a href="?admin=logout">Déconnexion</a></li>
            </ul>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="?admin=dashboard">Tableau de bord</a></li>
                <?php
                if(admin()==1){
                ?>
                <li><a href="?admin=addpost">Publier un article</a></li>
                <li><a href="?admin=lista">Listing des articles</a></li>
                <li><a href="?admin=addmodo">Paramètres</a></li>
                <?php
                }
                ?>
                <li><a href="?">Quitter</a></li>
                <li><a href="?admin=logout">Déconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
