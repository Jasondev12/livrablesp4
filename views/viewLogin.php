<?php
$title = 'Connexion | Jean Forteroche';
?>
<?php
ob_start();
?>
<?php
require('views/include/topbard.php');

?>
<div class='container'>
    <div class="row">
        <div class="col l4 m6 s12 offset-l4 offset-m3">
            <div class="card-panel">
                <div class="row">
                    <div class="col s6 offset-s3">
                        <img src="assets/img/admin.png" alt="Administrateur" width="100%" />
                    </div>
                </div>
                <h4 class="center-align">Se connecter</h4>
                <?php
                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $errors = [];
                    if(empty($email) || empty($password)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis!";
                    }else if($model->is_admin($email,$password) == 0){
                        $errors['exist']  = "Cet administrateur n'existe pas";
                    }
                    if(!empty($errors)){
                        ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach($errors as $error){
                        echo $error."<br/>";
                        }
                    ?>
                    </div>
                </div>
                <?php
                    }else{
                        $_SESSION['admin'] = $email;
                        header("Location:?page=dashboard");
                    }
                }
            ?>
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email" id="email" name="email" required />
                            <label for="email">Adresse email</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="password" id="password" name="password" required/>
                            <label for="password">Mot de passe</label>
                        </div>
                    </div>
                    <center>
                        <button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
                            <i class="material-icons left">perm_identity</i>
                            Se connecter
                        </button>
                        <br /><br />
                        <a href="?admin=newmodo">Nouveau modérateur</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('views/include/meta.php')
?>
