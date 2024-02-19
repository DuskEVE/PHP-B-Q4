<?php
include_once "./db.php";

$_POST['no'] = date('Ymd').rand(100000, 999999);
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['user'] = $_SESSION['member'];

$Orders->update($_POST);
?>

<script>
    alert('訂購成功!\n感謝您的訂購');
    location.href = '../index.php';
</script>