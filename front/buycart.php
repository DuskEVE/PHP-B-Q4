<?php
    if(!isset($_SESSION['user'])) header("location:?do=login");

    echo "<h2 class='ct'>{$_SESSION['member']}的購物車</h2>";
    if(!isset($_GET['id'])) echo "<h2 class='ct'>購物車中尚無商品</h2>"
?>