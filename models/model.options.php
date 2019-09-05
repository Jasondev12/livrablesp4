<?php
class ModelOptions{
// SUPPRIME POST OU COMMENTAIRE ET VALIDE LES COMMENTAIRES
 require('models/include/connectd.php');
if(isset($_GET['del_cmt'])){
    $del_post = $db->prepare('DELETE FROM comments WHERE id = :id_com');
    $del_post->execute([
        'id_com' => $_GET['del_cmt'],
    ]);
    header('Location: ?admin=dashboard');
}elseif(isset($_GET['del_post'])){
    $del_post = $db->prepare('DELETE FROM posts WHERE id = :id_post');
    $del_post->execute([
        'id_post' => $_GET['del_post'],
    ]);
    $del_post_c = $db->prepare('DELETE FROM comments WHERE post_id = :id_post');
    $del_post_c->execute([
        'id_post' => $_GET['del_post'],
    ]);
   
    header('Location: ?admin=dashboard');
} elseif(isset($_GET['v_cmt'])){
  $u_cmt = $db->prepare('UPDATE comments SET seen = :vue WHERE id = :id_cmt');
  $u_cmt->execute([
      'vue' => 1,
      'id_cmt' => $_GET['v_cmt'],
  ]);
  header('Location: ?admin=dashboard');
}else{
    header('Location: ?admin=dashboard');
    }
}
?>
