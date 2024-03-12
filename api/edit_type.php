<?php
include_once "./db.php";
$Type->update($_POST);
header("location:../admin.php?do=th");
?>