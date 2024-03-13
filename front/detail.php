<?php
$goods = $Goods->search(['id'=>$_GET['id']]);
$main = $Type->search(['id'=>$goods['main_id']]);
$sub = $Type->search(['id'=>$goods['sub_id']]);
?>

<style>

    td div{
        border-bottom: 2px solid white;
        padding: 2px;
    }
</style>

<div class="all">
    <h2 class="ct"><?=$goods['name']?></h2>

    <table class="all">
        <tr>
            <td class="pp">
                <img src="./img/<?=$goods['img']?>" style="width: 250px;">
            </td>
            <td>
                <div class="pp">分類:<?=$main['name'].">".$sub['name']?></div>
                <div class="pp">編號:<?=$goods['']?></div>
                <div class="pp">價格:<?=$goods['price']?></div>
                <div class="pp">簡介:<?=$goods['intro']?></div>
                <div class="pp">庫存:<?=$goods['stock']?></div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" id="id" value="<?=$goods['id']?>">
        購買數量 <input type="number" id="qt" value="1">
        <img class="buy-btn" src="./icon/0402.jpg">
    </div>
</div>

<script>
    $('.buy-btn').on('click', () => {
        let id = $('#id').val();
        let qt = $('#qt').val();
        location.href = `?do=buycart&id=${id}&qt=${qt}`;
    })
</script>