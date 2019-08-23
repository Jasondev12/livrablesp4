<?php



function listPosts()
{
  require('models/model.listPosts.php');
  $model = new ModelLPost();
  $posts = $model->getPosts();

  require('views/listPostsView.php');
}

function post()
{
  require('models/model.post.php');
  $model = new ModelPost();
  $post = $model->getPost($_GET['id']);
  $comments = $model->getComments($_GET['id']);

  require('views/postView.php');
}
function blog(){
  require('models/model.Blog.php');
  $model = new ModelBlog();
  $posts = $model->getAllPosts();

  require('views/listBlogView.php');
}
function apropos(){
  require('views/apropos.php');
}
function notFound(){
  require('views/errorView.php');
}