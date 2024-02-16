<style>
.item{
    width: 100%;
    display: flex;
}
.item .img{
    width: 30%;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border: 1px solid black;
}
.item .info{
    display: flex;
    flex-direction: column;
}
.item .info > div{
    border: 1px solid black;
    border-top: 0;
    border-left: 0;
    flex-grow: 1;
    display: flex;
    align-items: center;
}
.item .info > .tt{
    border-top: 1px solid black;;
}

</style>

<?php
$typeId = (isset($_GET['type'])? $_GET['type']:0);
$nav = "";
$goods = [];

if($typeId == 0){
    $nav = "全部商品";
    $goods = $Goods->searchAll();
}
else{
    $type = $Type->search(['id'=>$typeId]);
    if($type['main_id'] == 0){
        $nav = $type['name'];
        $goods = $Goods->searchAll(['main'=>$type['id']]);
    }
    else{
        $main = $Type->search(['id'=>$type['main_id']]);
        $nav = "{$main['name']} > {$type['name']}";
        $goods = $Goods->searchAll(['sub'=>$type['id']]);
    }
}
?>

<h2><?=$nav;?></h2>

<?php
foreach($goods as $good){
?>
<div class="item">
    <div class="img pp">
        <img src="./img/<?=$good['img']?>" style="width: 200px; height: 150px">
    </div>
    <div class="info pp">
        <div class="ct tt"><?=$good['name']?></div>
        <div style="justify-content: space-between;">
            價格:<?=$good['price']?>
            <img src="./icon/0402.jpg" onclick="location.href='?do=detail&id=<?=$good['id']?>'">
        </div>
        <div>規格:<?=$good['spec']?></div>
        <div>簡介:<?=$good['intro']?></div>
    </div>
</div>
<?php
}
?>