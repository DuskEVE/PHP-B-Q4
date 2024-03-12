<?php
include_once "./db.php";

if(!empty($_FILES['file']['name'])){
    move_uploaded_file($_FILES['file']['tmp_name'], "./img/{$_FILES['file']['name']}");
    $_POST['img'] = $_FILES['file']['name'];
}

if(!isset($_POST['id'])){
    $no = rand(100000, 999999);
    while($Goods->count(['no'=>$no])) $no = rand(100000, 999999);
    $_POST['no'] = $no;
    $_POST['display'] = 1;
}

$Goods->update($_POST);
header("location:../admin.php?do=th");
?>