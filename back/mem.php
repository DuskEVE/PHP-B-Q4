
<h2 class="ct">會員管理</h2>
<table class="all">
    <tr>
        <th class="tt ct">姓名</th>
        <th class="tt ct">會員帳號</th>
        <th class="tt ct">註冊日期</th>
        <th class="tt ct">管理</th>
    </tr>
    <?php
    $datas = $Member->searchAll();
    foreach($datas as $data){
    ?>
    <tr>
        <td class="pp ct"><?=$data['name']?></td>
        <td class="pp ct"><?=$data['user']?></td>
        <td class="pp ct"><?=$data['regdate']?></td>
        <td class="pp ct">
            <button class='edit-btn' data-id='<?=$data['id']?>'>修改</button>
            <button class='del-btn' data-id='<?=$data['id']?>'>刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    const editBtn = $('.edit-btn');
    const delBtn = $('.del-btn');

    editBtn.on('click', (event) => location.href=`./admin.php?do=edit_member&id=${$(event.target).data('id')}`);
    delBtn.on('click', (event) => del($(event.target).data('id'), 'member'));
</script>