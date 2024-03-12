<?php
include_once "./db.php";
$_POST['level'] = join(',', $_POST['level']);
$Admin->update($_POST);
header("location:../admin.php?do=admin");
?>