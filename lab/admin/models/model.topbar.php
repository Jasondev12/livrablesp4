<?php


function admin(){
    if(isset($_SESSION['admin'])){
        require('models/include/connect.php');
        $a = [
            'name'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];

        $sql = "SELECT * FROM admins WHERE name=:name AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);

        return $exist;
    }else{
        return 0;
    }
}



?>