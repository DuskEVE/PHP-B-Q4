<?php
include_once "./db.php";
$mainTypes = (isset($_GET['main_id'])? $Type->searchAll(['main_id'=>0]):$Type->searchAll());
echo json_encode($mainTypes);
?>