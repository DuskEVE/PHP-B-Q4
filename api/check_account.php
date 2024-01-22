<?php
include_once "./db.php";
$tsble = $_POST['table'];
unset($_POST['table']);
$DB = new myDB('localhost', 'utf8', 'db15_4', 'root', '', $tsble);

$check = $DB->count($_POST);
if($check){
    $_SESSION[$table] = $_POST['user'];
    echo $check;
}
else echo $check;
?>