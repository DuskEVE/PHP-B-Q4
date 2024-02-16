
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
$good = $Goods->search(['id'=>$_GET['id']]);
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
<div class="tt ct">
    購買數量: <input type="number" name="amount" id="amount" value="1" min="1">
    <img src="./icon/0402.jpg" class="buy-btn" data-id="<?=$_GET['id']?>">
</div>

<script>
    const buyBtn = $('.buy-btn');
    
    const buy = (event) => {
        let id = $(event.target).data('id');
        let amount = $('#amount').val();

        location.href = `?do=buycart&id=${id}&amount=${amount}`;
    }

    buyBtn.on('click', buy);
</script>