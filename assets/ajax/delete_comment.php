<?php
require "../../models/connect.models.php";
$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}");
