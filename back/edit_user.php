<?php
$user = $User->search(['id'=>$_GET['id']]);
?>

<div class="all">
    <h2 class="all">會員註冊</h2>

    <div>
        <input type="hidden" id="id" value="<?=$user['id']?>">
        <table style="width: 70%; margin:auto;">
            <tr>
                <td class="tt">帳號</td>
                <td class="pp">
                    <?=$user['user']?>
                </td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp">
                    <?=str_repeat("*", strlen($user['password']))?>
                </td>
            </tr>
            <tr>
                <td class="tt">姓名</td>
                <td class="pp">
                    <input type="text" id="name" class="name" value="<?=$user['name']?>">
                </td>
            </tr>
            <tr>
                <td class="tt">電話</td>
                <td class="pp">
                    <input type="text" id="phone" value="<?=$user['phone']?>">
                </td>
            </tr>
            <tr>
                <td class="tt">住址</td>
                <td class="pp">
                    <input type="text" id="addres" value="<?=$user['addres']?>">
                </td>
            </tr>
            <tr>
                <td class="tt">電子信箱</td>
                <td class="pp">
                    <input type="text" id="email" value="<?=$user['email']?>">
                </td>
            </tr>
        </table>
        <div class="ct">
            <button class="submit-btn">修改</button>|
            <button class="reset-btn">重置</button>|
            <button onclick="location.href='?do=user'">取消</button>
        </div>
    </div>
</div>

<script>
    $('.submit-btn').on('click', () => {
        let data = {
            id: $('#id').val(),
            name: $('#name').val(),
            phone: $('#phone').val(),
            addres: $('#addres').val(),
            email: $('#email').val()
        };

        $.post('./api/edit_user.php', data, (response) => location.href = '?do=user');
    });
    $('.reset-btn').on('click', () => {
        $('#name').val('');
        $('#phone').val('');
        $('#addres').val('');
        $('#email').val('');
    });
</script>