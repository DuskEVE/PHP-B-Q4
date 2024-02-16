<?php
    if(isset($_GET['id'])) $_SESSION['cart'][$_GET['id']] = $_GET['amount'];

    if(!isset($_SESSION['member'])) header("location:?do=login");

    echo "<h2 class='ct'>{$_SESSION['member']}的購物車</h2>";
    if(!isset($_GET['id'])) echo "<h2 class='ct'>購物車中尚無商品</h2>"
?>


<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id=>$amount){
        $good = $Goods->search(['id'=>$id]);
    ?>
    <tr class="pp ct">
        <td><?=$good['no']?></td>
        <td><?=$good['name']?></td>
        <td><?=$amount?></td>
        <td><?=$good['stock']?></td>
        <td><?=$good['price']?></td>
        <td><?=$amount*$good['price']?></td>
        <td></td>
    </tr>
    <?php
    }
    ?>
</table>