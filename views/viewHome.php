<?php
$title = 'Administation | Jean Forteroche';
?>
<?php
ob_start();
?>
<?php
require('views/include/topbard.php');

?>
<div class='container'>
    <style>
        .signaler {
            background-color: #e74c3c;
        }

    </style>
    <h2>Tableau de bord</h2>
    <div class="row">
        <?php

    $tables = [
        "Publications"          => "posts",
        "Commentaires"          => "comments",
        "Administrateurs"       => "admins"
    ];
    $colors = [
        "posts"             => "green",
        "comments"          => "red",
        "Admins"            => "blue"
    ];
    ?>
        <?php
        foreach($tables as $table_name => $table){
            ?>
        <div class="col l4 m6 s12">
            <div class="card">
                <div class="card-content <?= getColor($table,$colors) ?> white-text">
                    <span class="card-title"><?= $table_name ?></span>
                    <?php $nbrInTable = inTable($table); ?>
                    <h4><?= $nbrInTable[0] ?></h4>
                </div>
            </div>
        </div>
        <?php
        }
    ?>
        <h4>Commentaires non lus</h4>
        <?php
    $comments =  get_comments();
    $com_sign = get_comments_signaler();
?>
        <table>
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
        if(!empty($comments) || !empty($com_sign)) {
            foreach ($comments as $comment) {
                ?>
                <tr id="commentaire_<?= $comment->id ?>">
                    <td><?= $comment->title ?></td>
                    <td> <span> <?= substr($comment->comment, 0, 100); ?>... </span></td>
                    <td>
                        <a href="index.php?admin=options&v_cmt=<?= $comment->id ?>" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
                        <a href="index.php?admin=options&del_cmt=<?= $comment->id ?>" id="index.php?action=delete&del_cmt=<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
                        <a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
                        <div class="modal" id="comment_<?= $comment->id ?>">
                            <strong class="modal-content">
                                <h4><?= $comment->title ?></h4>
                                <p>Commentaire posté par
                                    <strong><?= $comment->name . " (" . $comment->email . ")<br/>Le " . date("d/m/Y à H:i", strtotime($comment->date)) ?>
                                    </strong></p>
                                <hr />
                                <p><?= nl2br($comment->comment) ?></p>
                            </strong>
                            <div class="modal-footer">
                                <a href="index.php?admin=options&del_cmt=<?= $comment->id ?>" id="<?= $comment->id ?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
                                <a href="index.php?admin=options&v_cmt=<?= $comment->id ?>" id="<?= $comment->id ?>" class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
            foreach ($com_sign as $comment) {
                ?>
                <tr class='signaler' id="commentaire_<?= $comment->id ?>">
                    <td><?= $comment->title ?></td>
                    <td><?= substr($comment->comment, 0, 100); ?>...</td>
                    <td>
                        <a href="index.php?admin=options&v_cmt=<?= $comment->id ?>" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
                        <a href="index.php?admin=options&del_cmt=<?= $comment->id ?>" id="index.php?action=delete&del_cmt=<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
                        <a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
                        <div class="modal" id="comment_<?= $comment->id ?>">
                            <div class="modal-content">
                                <h4><?= $comment->title ?></h4>
                                <p>Commentaire posté par
                                    <strong><?= $comment->name . " (" . $comment->email . ")<br/>Le " . date("d/m/Y à H:i", strtotime($comment->date)) ?>
                                    </strong></p>
                                <hr />
                                <p><?= nl2br($comment->comment) ?></p>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?admin=options&del_cmt=<?= $comment->id ?>" id="<?= $comment->id ?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
                                <a href="index.php?admin=options&v_cmt=<?= $comment->id ?>" id="<?= $comment->id ?>" class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
            }else {
            ?>
                <tr>
                    <td></td>
                    <td>
                        <center>Aucun commentaire à valider</center>
                    </td>
                </tr>
                <?php
        }
        ?>
            </tbody>
        </table>
        <pre>
</pre>
    </div>
    <?php
$content = ob_get_clean();
require('views/include/metad.php')
?>