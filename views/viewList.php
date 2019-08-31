<?php
$title = 'Listing | Jean Forteroche';
?>
<?php
ob_start();
?>
<?php
require('views/include/topbard.php');

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
                    <?= substr(nl2br(html_entity_decode($post['content'])),0,1200) ?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="img/posts/<?= $post['image'] ?>" class="materialboxed responsive-img" alt="<?= $post['title'] ?>" />
                    <br /><br />
                    <a class="btn light-blue waves-effect waves-light" href="?admin=upost&id=<?= $post['id'] ?>">Modifier</a>
                    <a class="btn light-red " href="?admin=options&del_post=<?= $post['id'] ?>">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>

<?php
$content = ob_get_clean();
require('views/include/metad.php')
?>
