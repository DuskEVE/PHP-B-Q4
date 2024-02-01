<?php
include_once "./db.php";
$Type->update($_POST);
echo $Type->searchAll([], "order by `id` desc limit 1")[0]['id'];
?>