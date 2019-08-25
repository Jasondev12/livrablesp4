<?php
require('models/include/meta.php');
require('models/include/topbar.php');
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
                <?= substr(nl2br($post['content']),0,1200) ?>...
            </div>
            <div class="col s12 m6 l4">
  
                <img src="img/posts/<?= $post['image']?>" class="materialboxed responsive-img" alt="<?= $post['title']?>">

                <br/><br/>
                <a class="btn light-blue waves-effect wave-light" href="index.php?action=post&id=<?= $post['id']?>">Lire l'article complet</a>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
</div>
<?php
require('models/include/footer.php');
?>
