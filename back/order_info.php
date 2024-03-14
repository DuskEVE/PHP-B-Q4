<?php
$order = $Orders->search(['id'=>$_GET['id']]);
?>

<h3 class="ct">訂單編號<span style="color: red;"><?=$order['no']?></span>的詳細資料</h3>
<div class="all">
    <table class="all">
        <tr>
            <td class="tt ct" style="width: 40%;">會員帳號</td>
            <td class="pp">
                <?=$order['user']?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><?=$order['name']?></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><?=$order['email']?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><?=$order['addres']?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp"><?=$order['phone']?></td>
        </tr>
    </table>
    <table class="all ct">
        <tr class="tt">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
        $cart = unserialize($order['goods']);
        foreach ($cart as $id => $qt) {
            $goods = $Goods->search(['id' => $id])
        ?>
            <tr class="pp">
                <td><?= $goods['no'] ?></td>
                <td><?= $goods['name'] ?></td>
                <input type="number" hidden id="amount-<?= $goods['id'] ?>" name='goods[<?= $goods['id'] ?>]' value="<?= $qt ?>">
                <td id="qt-<?= $goods['id'] ?>">
                    <?= $qt ?>
                </td>
                <td><?= $goods['price'] ?></td>
                <td class="count count-<?= $goods['id'] ?>"><?= ($goods['price'] * $qt) ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <input type="hidden" name="total" id="total" value="">
    <div class="tt ct">總價:<?=$order['total']?></div>
    <div class="ct">
        <button onclick="location.href='?do=order'">返回</button>
    </div>
</div>