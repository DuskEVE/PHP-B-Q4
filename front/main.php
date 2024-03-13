<?php
$title = "全部商品";
if(isset($_GET['sub_id'])){
    $allGoods = $Goods->searchAll(['sub_id'=>$_GET['sub_id'], 'display'=>1]);
    $main = $Type->search(['id'=>$_GET['main_id']]);
    $sub = $Type->search(['id'=>$_GET['sub_id']]);
    $title = "{$main['name']} > {$sub['name']}";
}
else if(isset($_GET['main_id'])){
    $allGoods = $Goods->searchAll(['main_id'=>$_GET['main_id'], 'display'=>1]);
    $main = $Type->search(['id'=>$_GET['main_id']]);
    $title = $main['name'];
}
else $allGoods = $Goods->searchAll(['display'=>1]);
?>

<style>

    td div{
        border-bottom: 2px solid white;
        padding: 2px;
    }
</style>

<div class="all">
    <h2><?=$title?></h2>

    <table class="all">
        <?php
        foreach($allGoods as $goods){
        ?>
        <tr>
            <td class="pp">
                <a href="?do=detail&id=<?=$goods['id']?>" style="float: right;"><img src="./img/<?=$goods['img']?>" style="width: 150px;"></a>
            </td>
            <td>
                <div class="tt ct"><?=$goods['name']?></div>
                <div class="pp">
                    價格:<?=$goods['price']?>
                    <a href="?do=buycart&id=<?=$goods['id']?>&qt=1" style="float: right;"><img src="./icon/0402.jpg"></a>
                </div>
                <div class="pp">規格:<?=$goods['spec']?></div>
                <div class="pp">簡介:<?=$goods['intro']?></div>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

</div>
