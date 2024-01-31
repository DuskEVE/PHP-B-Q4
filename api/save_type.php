<?php
include_once "./db.php";
$Type->update($_POST);
if($_POST['main_id'] == 0) echo ""
?>