<?php
if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if(!isset($_SESSION['user'])) header("location:?do=login");
?>

<div class="all cart">
    <h3 class="ct"><?=$_SESSION['user']?>的購物車</h3>
    <table class="all">
        <tr class="tt">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>庫存量</td>
            <td>單價</td>
            <td>小計</td>
            <td>刪除</td>
        </tr>
        <?php
        $cart = [];
        if(isset($_SESSION['cart'])) $cart = $_SESSION['cart'];
        foreach($cart as $id=>$qt){
            $goods = $Goods->search(['id'=>$id])
        ?>
        <tr class="pp">
            <td><?=$goods['no']?></td>
            <td><?=$goods['name']?></td>
            <td><input type="number" class="qt" data-id="<?=$goods['id']?>" data-price="<?=$goods['price']?>" value="<?=$qt?>"></td>
            <td><?=$goods['stock']?></td>
            <td><?=$goods['price']?></td>
            <td class="count-<?=$goods['id']?>"><?=($goods['price']*$qt)?></td>
            <td><img src="./icon/0415.jpg" class="del-btn" data-id="<?=$goods['id']?>"></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <img src="./icon/0411.jpg" onclick="location.href='./index.php'"> <img class="checkout-btn" src="./icon/0412.jpg">
    </div>
</div>

<div class="all checkout" style="display: none;">
    <h3 class="ct">填寫資料</h3>
    <form action="./api/checkout.php" method="post">
        <table class="all">
            <tr>
                <td class="tt ct" style="width: 40%;">登入帳號</td>
                <td class="pp"><?=$_SESSION['user']?></td>
            </tr>
            <tr>
                <td class="tt ct">姓名</td>
                <td class="pp"><input type="text" name="name"></td>
            </tr>
            <tr>
                <td class="tt ct">電子信箱</td>
                <td class="pp"><input type="text" name="email"></td>
            </tr>
            <tr>
                <td class="tt ct">聯絡地址</td>
                <td class="pp"><input type="text" name="addres"></td>
            </tr>
            <tr>
                <td class="tt ct">聯絡電話</td>
                <td class="pp"><input type="text" name="phone"></td>
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
            $cart = [];
            if(isset($_SESSION['cart'])) $cart = $_SESSION['cart'];
            foreach($cart as $id=>$qt){
                $goods = $Goods->search(['id'=>$id])
            ?>
            <tr class="pp">
                <td><?=$goods['no']?></td>
                <td><?=$goods['name']?></td>
                <td id="qt-<?=$goods['id']?>">
                    <?=$qt?>
                    <input type="hidden" id="amount-<?=$goods['id']?>" name="amount" value="<?=$qt?>">
                </td>
                <td><?=$goods['price']?></td>
                <td class="count-<?=$goods['id']?>"><?=($goods['price']*$qt)?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="tt ct">總價:</div>
        <div class="ct">
            <input type="submit" value="確認送出">
            <input type="button" class="back-btn" value="返回修改訂單">
        </div>
    </form>
</div>

<script>
$('.qt').on('change', (event) => {
    let id = $(event.target).data('id');
    let price = $(event.target).data('price');
    let amount = $(event.target).val();
    let result = price * amount;

    $(`.count-${id}`).text(result);
    $(`#qt-${id}`).text(amount);
    $(`#amount-${id}`).val(amount);
});
$('.checkout-btn').on('click', () => {
    $('.cart').hide();
    $('.checkout').show();
});
$('.back-btn').on('click', () => {
    $('.cart').show();
    $('.checkout').hide();
});
</script>