<?php
$title = 'Blog | Jean Forteroche';
?>
<?php
ob_start();
?>
<?php
require('views/include/topbar.php');

?>
<div class="container">
    <h1>Blog</h1>
    <?php
while($post = $posts->fetch()){
 ?>
    <div class="row">
        <div class="col s12 m12 l12">
            <h4><?= $post['title'] ?></h4>
            <div class="row">
                <div class="col s12 m6 l8">
                    <?= substr(nl2br(html_entity_decode($post['content'])),0,1200) ?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="img/posts/<?= $post['image']?>" class="materialboxed responsive-img" alt="<?= $post['title']?>">
                    <br /><br />
                    <a class="btn light-blue waves-effect wave-light" href="index.php?client=post&id=<?= $post['id']?>">Lire l'article complet</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>
<?php
require('views/include/footer.php');
?>
<?php
$content = ob_get_clean();
require('views/include/meta.php')
?>
