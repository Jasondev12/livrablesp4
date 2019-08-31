<?php
$title = 'Accueil | Jean Forteroche';
?>
<?php
ob_start();
?>
<?php
require('views/include/topbar.php');

?>
<div class="container">
    <h1>Page d'accueil</h1>
    <div class="row" id="row-home">
        <?php
while ($data = $posts->fetch())
{
    ?>
        <div class="col l6 m6 s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="grey-text text-darken-2"><?= $data['title'] ?></h5>
                    <h6 class="grey-text">Le <?= date("d/m/Y à H:i",strtotime($data['date'])); ?> par <?= $data['writer'] ?></h6>
                </div>
                <div class="card-image waves-effect waves-block waves-light">
                    <img src="img/posts/<?= $data['image']?>" class="activator" alt="<?= $data['title'] ?>" />
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                    <p><a href="index.php?client=post&id=<?= $data['id'] ?>">Voir l'article complet</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $data['title'] ?> <i class="material-icons right">close</i></span>
                    <p><?= substr(nl2br(html_entity_decode($data['content'])),0,1000); ?>...</p>
                </div>
            </div>
        </div>
        <?php
}
?>
    </div>
</div>
<?php
require('views/include/footer.php');
?>
<?php
$content = ob_get_clean();
require('views/include/meta.php')
?>
