<?php
// IMPORTE VIEW.PHP
require_once('views/View.php');

//Creation de la classe ControllerAccueil
class ControllerAccueil{
//INSTANCE
  private $_articleManager;
  private $_view;
//CONSTRUCTEUR QUI REGARDE SI UN URL EST DONNE si oui throw une erreur ET SINON APPELLE LA FUNCTION   articles() ci-dessous
  public function __construct($url){
    if(isset($url) && count($url) > 1)
    throw new Exception('Page Introuvable');
    else
    $this->articles();
  }
  //Function  articles qui permet de recuperer les articles generate un tableaux avec toutes les données
  private function articles(){
    $this->_articleManager = new ArticleManager;
    $articles = $this->_articleManager->getArticles();

    $this->_view = new View('Accueil');
    $this->_view->generate(array('articles' => $articles));
    }
}



 ?>
