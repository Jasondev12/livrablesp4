<?php 
 $db = new PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', '');
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
    header('Location: index.php');
}else{
    header('Location: index.php');
}








?>