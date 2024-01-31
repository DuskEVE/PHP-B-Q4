<?php
session_start();
unset($_SESSION['member']);
unset($_SESSION['admin']);

header("location:../index.php");
?>