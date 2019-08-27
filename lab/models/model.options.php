<?php
 require('models/include/connectd.php');
if(isset($_GET['del_cmt'])){
    $del_post = $db->prepare('DELETE FROM comments WHERE id = :id_com');
    $del_post->execute([
        'id_com' => $_GET['del_cmt'],
    ]);
    header('Location: index.php?admin=dashboard');
}elseif(isset($_GET['del_post'])){
    $del_post = $db->prepare('DELETE FROM posts WHERE id = :id_post');
    $del_post->execute([
        'id_post' => $_GET['del_post'],
    ]);
    header('Location: index.php?admin=dashboard');
} elseif(isset($_GET['v_cmt'])){
  $u_cmt = $db->prepare('UPDATE comments SET seen = :vue WHERE id = :id_cmt');
  $u_cmt->execute([
      'vue' => 1,
      'id_cmt' => $_GET['v_cmt'],
  ]);
  header('Location: index.php?admin=dashboard');
}elseif(isset($_GET['s_cmt'])){
    $u_cmt = $db->prepare('UPDATE comments SET seen = :vue WHERE id = :id_cmt');
    $u_cmt->execute([
        'vue' => 2,
        'id_cmt' => $_GET['s_cmt'],
    ]);
    header('Location: index.php?client=post&id=');
    echo $_GET['id_post'];
  }else{
    header('Location: index.php?admin=dashboard');
}








?>
