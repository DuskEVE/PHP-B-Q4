<?php
include_once "./db.php";
if(!isset($_POST['id'])) $_POST['regdate'] = date("Y-m-d");
$Member->update($_POST);

if(isset($_POST['id'])) header("location:../admin.php?do=mem");
?>