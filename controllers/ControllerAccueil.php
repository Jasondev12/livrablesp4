<?php
// IMPORTE VIEW.PHP
require_once('views/View.php');

//Creation de la classe ControllerAccueil
class ControllerAccueil{
//INSTANCE
  private $_postManager;
  private $_view;
//CONSTRUCTEUR QUI REGARDE SI UN URL EST DONNE si oui throw une erreur ET SINON APPELLE LA FUNCTION   articles() ci-dessous
  public function __construct($url){
    if(isset($URL) && count($URL) > 0)
    throw new Exception('Page Introuvable');
    else
    $this->posts();
  }
  //Function  posts qui permet de recuperer les articles generate un tableaux avec toutes les données
  private function posts(){
    $this->_postManager = new PostManager;
    $posts = $this->_postManager->getPosts();

    $this->_view = new View('Accueil');
    $this->_view->generate(array('posts' => $posts));
    }
}



 ?>
