
<h3 class="ct">訂單管理</h3>
<div class="ct"><button onclick="location.href='?do=add_order'">新增商品</button></div>
<table class="all">
    <tr class="tt">
        <th style="width: 20%;">訂單編號</th>
        <th style="width: 10%;">金額</th>
        <th style="width: 20%;">會員帳號</th>
        <th style="width: 20%;">姓名</th>
        <th style="width: 20%;">下單時間</th>
        <th style="width: 10%;">操作</th>
    </tr>
    <?php
    $orders = $Orders->searchAll();
    foreach($orders as $order){
    ?>
    <tr class="pp ct">
        <td onclick="location.href='?do=order_info&id=<?=$order['id']?>'"><?=$order['no']?></td>
        <td><?=$order['total']?></td>
        <td><?=$order['user']?></td>
        <td><?=$order['name']?></td>
        <td><?=$order['date']?></td>
        <td>
            <button class="del-order" data-id="<?=$order['id']?>">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    $('.del-order').on('click', (event) => {
    const target = $(event.target);
    let id = target.data('id');

    $.post('./api/del_order.php', {id}, () => target.parent().parent().remove());
    });
</script>