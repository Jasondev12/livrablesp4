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
                        <img src="assets/img/modo.png" alt="Modérateur" width="100%" />
                    </div>
                </div>
                <h4 class="center-align">Se connecter</h4>
                <?php
                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $token = htmlspecialchars(trim($_POST['token']));
                    $errors = [];
                    if(empty($email) || empty($token)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }else if($model->is_modo($email,$token) == 0){
                        $errors['exist'] = "Ce modérateur n'existe pas";
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
                        header("Location:?admin=password");
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
                            <input type="text" id="token" name="token" required />
                            <label for="token">Code unique</label>
                        </div>
                        <center>
                            <button type="submit" name="submit" class="btn waves-effect waves-light light-blue">
                                <i class="material-icons left">perm_identity</i>
                                Se connecter
                            </button>
                            <br /><br />
                            <a href="?admin=dashboard">Déjà modérateur</a>
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
