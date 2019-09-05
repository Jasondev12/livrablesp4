<?php
class ModelSigna{
// SIGNALEMENT D'1 COMMENTAIRE
 require('models/include/connectd.php');
if(isset($_GET['s_cmt'])){
    $u_cmt = $db->prepare('UPDATE comments SET seen = :vue WHERE id = :id_cmt');
    $u_cmt->execute([
        'vue' => 2,
        'id_cmt' => $_GET['s_cmt'],
    ]);
    header('Location: ?client=post&id='.$_GET['post'].'');

  }
}
?>
