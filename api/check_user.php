<?php
include_once "./db.php";
echo $Member->count(['user'=>$_GET['user']]);
?>