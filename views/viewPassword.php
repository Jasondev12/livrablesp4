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
                        <img src="assets/img/modo.png" alt="image modérateur" width="100%">
                    </div>
                </div>
                <h4 class="center-align">Choisir un mot de passe</h4>
                <?php
                if(isset($_POST['submit'])){
                    $password = htmlspecialchars(trim($_POST['password']));
                    $password_again = htmlspecialchars(trim($_POST['password_again']));
                    $errors = [];
                    if(empty($password) || empty($password_again)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }
                    if($password != $password_again){
                        $errors['different'] = "Les mots de passe sont différents";
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
                        update_password($password);
                        header("Location:?admin=dashboard");
                    }
                }
            ?>
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" id="password" name="password" required />
                            <label for="password">Choisisser un mot de passe</label>
                            <div class="input-field col s12">
                                <input type="password" name="password_again" id="password_again" required />
                                <label for="password_again">Répéter le mot de passe</label>
                            </div>
                        </div>
                        <center>
                            <button type="submit" name="submit" class="btn light-blue waves-effect waves-light">
                                <i class="material-icons left">perm_identity</i>
                                Se connecter
                            </button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require('views/include/metad.php')
?>
