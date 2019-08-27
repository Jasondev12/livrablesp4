<?php
// DEFINIT LES FONCTIONS APPELES DANS L'INDEX.PHP
function upost(){
  require('models/model.postd.php');
  require('views/viewPost.php');
}

function password(){
  require('models/model.password.php');
  require('views/viewPassword.php');
}

function newmodo(){
  require('models/model.newModo.php');
  require('views/viewModo.php');
}

function quit(){
  header('Location: index.php');
}

function options(){
  require('models/model.options.php');

}

function logout()
{
  session_start();
  session_destroy();
  header('Location: index.php');
}

function addmdo(){
  require('models/model.addmdo.php');
  require('views/viewAddModo.php');
}

function lista_modif(){
  require('models/model.list.php');
  $model = new ModelEPost();
  $result = $model->get_post();
  require('views/viewList.php');
}

function addarticle(){
  require('models/model.addpost.php');
  $model = new ModelAPost();
  require('views/viewAddArticle.php');
}

function dashboard(){
  require('models/model.home.php');
  require('views/viewHome.php');
}

function signin(){
  require('models/model.signin.php');
  require('views/viewLogin.php');
}

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
