<?php
include_once "./db.php";
$_POST['regdate'] = date("Y-m-d");
$Member->update($_POST);
?>