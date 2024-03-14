<?php
include_once "./db.php";
$_POST['goods'] = serialize($_POST['goods']);

$no = date("Ymd").rand(100000, 999999);
while($Orders->count(['no'=>$no])) $no = date("Ymd").rand(100000, 999999);
$_POST['no'] = $no;
$_POST['date'] = date("Y-m-d");

$Orders->update($_POST);
unset($_SESSION['cart']);
?>
<script>
    alert('訂購成功! 感謝您的選購');
    location.href = '../index.php';
</script>
