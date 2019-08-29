<?php
require('models/include/metad.php');
require('models/include/topbard.php');
?>
<div class='container'>
    <h2 id="titre-list">Listing des articles</h2>
    <hr />
    <?php
while($post = $result->fetch()){
    ?>
    <div class="row">
        <div class="col s12">
            <h4><?= $post['title'] ?><?php echo ($post['posted'] == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?= substr(nl2br($post['content']),0,1200) ?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="img/posts/<?= $post['image'] ?>" class="materialboxed responsive-img" alt="<?= $post['title'] ?>" />
                    <br /><br />
                    <a class="btn light-blue waves-effect waves-light" href=".php?admin=upost&id=<?= $post['id'] ?>">Modifier</a>
                    <a class="btn light-red " href="?admin=options&del_post=<?= $post['id'] ?>">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>
