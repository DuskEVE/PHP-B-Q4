<?php
include_once "./db.php";
$_POST['pr'] = serialize($_POST['pr']);
$Admin->update($_POST);

header("location:../admin.php?do=admin");
?>