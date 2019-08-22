<nav class="blue-grey darken-4">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=dashboard" class="brand-logo">Administration</a>

            <?php
            if($page != 'login' && $page != 'new' && $page != 'password'){
            ?>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
                <?php
                if(admin()==1){
                ?>
                <li class="><i class="material-icons">edit</i></nav></li>
                <li class=""><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>
                <li class=""><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>
                <?php
                }

                ?>
                <li><a href="../index.php?page=home">Quitter</a></li>
                <li><a href="index.php?page=logout">Déconnexion</a></li>
            </ul>

            <ul class="sidenav" id="mobile-demo">
                <li class=""><a href="index.php?page=dashboard">Tableau de bord</a></li>
                <?php
                if(admin()==1){
                ?>
                <li class=""><a href="index.php?page=write">Publier un article</a></li>
                <li class=""><a href="index.php?page=list">Listing des articles</a></li>
                <li class=""><a href="index.php?page=settings">Paramètres</a></li>
                <?php
                }
                ?>
                <li><a href="../index.php?page=home">Quitter</a></li>
                <li><a href="index.php?page=logout">Déconnexion</a></li>
            </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
