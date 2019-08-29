<?php
class ModelAPost{
function post($title,$content,$posted){
   require('models/include/connectd.php');
    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admin'],
        'posted'    =>  $posted

    ];

    $sql = "
      INSERT INTO posts(title,content,writer,date,posted)
      VALUES(:title,:content,:writer,NOW(),:posted)
    ";

    $req = $db->prepare($sql);
    $req->execute($p);
    $req_id = $db->prepare('SELECT * FROM posts WHERE title = :title ');
    $req_id->execute([
      'title' => $title
    ]);
    $post_info = $req_id->fetch();
    return $post_info;
}

function post_img($tmp_name, $extension, $id){
   require('models/include/connectd.php');
    $i = [
        'id'    =>  $id,
        'image' =>  $id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
    ];

    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"img/posts/".$id.$extension);
    header("Location:?client=post&id=".$id);
}
}
