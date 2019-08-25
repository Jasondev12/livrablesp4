

<?php require('models/include/meta.php'); ?>
<?php require('models/include/topbar.php') ?>
        </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="../assets/img/posts/<?= $post['image'] ?>" alt="<?= $post['title'] ?>"/>
        </div>
    </div>
        <div class="container">

            <h2><?=  $post['title'] ?></h2>
            <h6>Par <?=  $post['writer'] ?> le <?= date("d/m/Y à H:i", strtotime($post['date'])) ?></h6>
            <p><?= nl2br( $post['content']); ?></p>
            <h4>Commentaires:</h4>
            <?php

                  while($comment = $comments->fetch()){
                        ?>
                            <blockquote>
                                <strong><?= $comment['name'] ?> (<?= date("d/m/Y", strtotime($comment['date'])) ?>)</strong>
                                <p><?= nl2br($comment['comment']); ?></p>
                            </blockquote>
                        <?php
                    }
            ?>

            <h4>Commenter:</h4>

            <?php
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $errors = [];

                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "L'adresse email n'est pas valide";
                        }
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
                        $model->comment($name,$email,$comment);
                        ?>
                            <script>
                                window.location.replace("index.php?action=post&id=<?= $_GET['id'] ?>");
                            </script>
                        <?php
                    }

                }

            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="email" name="email" id="email"/>
                        <label for="email">Adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                        <label for="comment">Commentaire</label>
                    </div>

                    <div class="col s12">
                        <button type="submit" name="submit" class="btn waves-effect light-blue">
                            Commenter ce post
                        </button>
                    </div>
                </div>
            </form>
            <div class="return">
              <div class="returnpost">
                  <a href="index.php?action=blog" class="btn-floating light-blue  pulse"><i class="material-icons">keyboard_return</i></a>
              </div>
                    <a href="index.php" class="btn-floating light-blue  pulse"><i class="material-icons">home</i></a>
            </div>
            </div>

<?php require('models/include/footer.php') ?>
