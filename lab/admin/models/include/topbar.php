<?php require_once('models/model.topbar.php'); ?>
<nav class="blue-grey darken-4">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index?" class="brand-logo">Administration</a>

            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li ><a href="index?"><i class="material-icons">dashboard</i></a></li>
                <?php
                if(admin()==1){
                ?>
                <li ><a href="index.php?action=addpost"><i class="material-icons">edit</i></a></li>
                <li><a href="index.php?action=lista"><i class="material-icons">view_list</i></a></li>
                <li ><a href="index.php?action=addmodo"><i class="material-icons">settings</i></a></li>
                <?php
                }

                ?>
                <li><a href="index.php?action=quit">Quitter</a></li>
                <li><a href="index.php?action=logout">Déconnexion</a></li>
            </ul>

            <ul class="sidenav" id="mobile-demo">
                <li><a href="index?">Tableau de bord</a></li>
                <?php
                if(admin()==1){
                ?>
                <li ><a href="index.php?action=addpost">Publier un article</a></li>
                <li ><a href="index.php?action=lista">Listing des articles</a></li>
                <li ><a href="index.php?action=addmodo">Paramètres</a></li>
                <?php
                }
                ?>
                <li><a href="index?">Quitter</a></li>
                <li><a href="index.php?action=logout">Déconnexion</a></li>
            </ul>

        </div>
    </div>
</nav>
