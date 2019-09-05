<?php
class ModelTbar{
// VERIFICATION SI L'UTILISATEUR EST ADMIN
function admin(){
    if(isset($_SESSION['id'])){
        require('models/include/connectd.php');
        $a = [
            'email'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];

        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);

        return $exist;
    }else{
        return 0;
    }
  }
}
?>
