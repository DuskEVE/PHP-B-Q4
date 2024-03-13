<div class="all">
    <h2 class="ct">會員管理</h2>
    <table class="ct all">
        <tr>
            <th class="tt">姓名</th>
            <th class="tt">會員帳號</th>
            <th class="tt">註冊日期</th>
            <th class="tt">操作</th>
        </tr>
        <?php
        $users = $User->searchAll();
        foreach($users as $user){
        ?>
        <tr>
            <td class="pp"><?=$user['name']?></td>
            <td class="pp"><?=$user['user']?></td>
            <td class="pp"><?=$user['date']?></td>
            <td class="pp">
                <button onclick="location.href='?do=edit_user&id=<?=$user['id']?>'">修改</button>
                <button class="del-btn" data-id="<?=$user['id']?>">刪除</button>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>

<script>

    $('.del-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        $.post('./api/del_user.php', {id, table:'user'}, (re) => location.reload());
    });
</script>