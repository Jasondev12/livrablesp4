

<?php require('template.php'); ?>
<?php require('topbar.php') ?>
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


            </div>
<?php require('footer.php') ?>
