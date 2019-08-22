<?php

require('models/model.php');

function listPosts()
{
    $posts = getPosts();

    require('views/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('views/postView.php');
}
function blog(){
  $posts = getAllPosts();

  require('views/listBlogView.php');
}
function apropos(){
  require('views/apropos.php');
}
