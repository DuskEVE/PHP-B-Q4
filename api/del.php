<?php
include_once "./db.php";
$table = $_POST['table'];
$DB = new myDB('localhost', 'utf8', 'db15_4', 'root', '', $table);
$DB->delete(['id'=>$_POST['id']]);
?>