<?php
 require('models/include/connect.php');
if(isset($_GET['del_cmt'])){
    $del_post = $db->prepare('DELETE FROM comments WHERE id = :id_com');
    $del_post->execute([
        'id_com' => $_GET['del_cmt'],
    ]);
    header('Location: index.php');
}elseif(isset($_GET['del_post'])){
    $del_post = $db->prepare('DELETE FROM posts WHERE id = :id_post');
    $del_post->execute([
        'id_post' => $_GET['del_post'],
    ]);
    header('Location: index?action=lista');
} elseif(isset($_GET['v_cmt'])){
  $u_cmt = $db->prepare('UPDATE comments SET seen = :vue WHERE id = :id_cmt');
  $u_cmt->execute([
      'vue' => 1,
      'id_cmt' => $_GET['v_cmt'],
  ]);
  header('Location: index.php');
}else{
    header('Location: index.php');
}








?>
