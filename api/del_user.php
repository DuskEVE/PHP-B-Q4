<?php
include_once "./db.php";
$DB = new myDB($_POST['table']);
$DB->delete(['id'=>$_POST['id']]);
?>