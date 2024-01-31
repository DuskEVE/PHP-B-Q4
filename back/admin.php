<div class="ct">
    <button onclick="location.href='./admin.php?do=add_admin'">新增管理員</button>
</div>

<table class="all">
    <tr>
        <th class="tt ct">帳號</th>
        <th class="tt ct">密碼</th>
        <th class="tt ct">管理</th>
    </tr>
    <?php
    $datas = $Admin->searchAll();
    foreach($datas as $data){
    ?>
    <tr>
        <td class="pp ct"><?=$data['user']?></td>
        <td class="pp ct"><?=$data['password']?></td>
        <td class="pp ct">
            <?php
            if($data['user'] == 'admin') echo "此帳號為最高權限";
            else{
                echo "
                <button class='edit-btn' data-id='{$data['id']}'>修改</button>
                <button class='del-btn' data-id='{$data['id']}'>刪除</button>
                ";
            }
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    const editBtn = $('.edit-btn');
    const delBtn = $('.del-btn');

    editBtn.on('click', (event) => location.href=`./admin.php?do=edit_admin&id=${$(event.target).data('id')}`);
    delBtn.on('click', (event) => del($(event.target).data('id'), 'admin'));
</script>