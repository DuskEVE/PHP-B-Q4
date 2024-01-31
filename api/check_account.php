<?php
include_once "./db.php";
$table = $_POST['table'];
unset($_POST['table']);
$DB = new myDB('localhost', 'utf8', 'db15_4', 'root', '', $table);

$check = $DB->count($_POST);
if($check){
    $_SESSION[$table] = $_POST['user'];
    echo $check;
}
else echo $check;
?>