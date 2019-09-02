<?php
$title = 'Erreur | Jean Forteroche';
?>
<?php
ob_start();
?>
<?php
require('views/include/topbar.php');

?>

<?php ?>
    <!-- Page content -->
    <main>

        <div class="biocontent">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="titre-bio">Oups, il y a une erreur !</h2>
                        <p class="text-bio">
                        <?= $message ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="return">
                <div class="col">
                    <a href="index.php?page=home" class="btn-floating light-blue  pulse"><i class="material-icons">home</i></a>

                </div>
            </div>
        </div>
    </main>

<?php
require('views/include/footer.php');
?>
<?php
$content = ob_get_clean();
require('views/include/meta.php')
?>
