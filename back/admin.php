<div class="all">
    <div class="all ct">
        <button onclick="location.href='?do=add_admin'">新增管理員</button>
    </div>
    <table class="ct all">
        <tr>
            <th class="tt">帳號</th>
            <th class="tt">密碼</th>
            <th class="tt">管理</th>
        </tr>
        <?php
        $admins = $Admin->searchAll();
        foreach($admins as $admin){
        ?>
        <tr>
            <td class="pp"><?=$admin['user']?></td>
            <td class="pp"><?=str_repeat("*", strlen($admin['password']))?></td>
            <td class="pp">
                <?php
                if($admin['user'] == "admin") echo "此帳號為最高權限";
                else{
                ?>
                <button onclick="location.href='?do=edit_admin&id=<?=$admin['id']?>'">修改</button>
                <button class="del-btn" data-id="<?=$admin['id']?>">刪除</button>
                <?php
                }
                ?>
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
        $.post('./api/del_user.php', {id, table:'admin'}, (re) => location.reload());
    });
</script>