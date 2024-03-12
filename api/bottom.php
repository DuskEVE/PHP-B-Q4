<?php
include_once "./db.php";
$Bottom->update($_POST);
header("location:../admin.php?do=bottom");
?>