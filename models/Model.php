<?php

abstract class Model
{
   private static $_bdd;
   private static function setBdd()
   {
     private $dbhost = 'localhost';
     private $dbname = 'blogp4';
     private $dbuser = 'root';
     private $dbpswd = '';

     self::$_bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd);
     self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO:ERRMODE_WARNING)
   }
   protected function getBdd(){
    if(self::$_bdd == null)
    $this->setBdd();
    return self::$_bdd;
   }
   protected function getAll($table, $obj){
     $var= [];
     $req = self::$_bdd->prepare( 'SELECT * FROM . table . ORDER BY id desc');
     $req->execute();
     while ($data = $req->fetch(PDO::FETCH_ASSOC)){
       $var[] = new $obj($data);
     }
     return $var;
     $req->closeCursor();
   }

    console.log('', );

}





 ?>
