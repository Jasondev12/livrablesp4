<?php

require "../../models/connect.models.php";

$db->exec("UPDATE comments SET seen='1' WHERE id='{$_POST['id']}'");
