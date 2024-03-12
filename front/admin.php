<div class="all">

    <h3>會員登入</h3>
    <table style="width: 70%; margin:auto;">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp">
                <input type="text" class="login-user">
            </td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp">
                <input type="password" class="login-password">
            </td>
        </tr>
        <tr>
            <td class="tt">驗證碼</td>
            <td class="pp">
                <?php
                $a = rand(10, 99);
                $b = rand(10, 99);
                $_SESSION['check'] = $a + $b;
                echo "$a + $b = ";
                ?>
                <input type="number" class="check">
            </td>
        </tr>
    </table>
    <div class="ct"><button class="login-submit">確認</button></div>
</div>

<script>
    $('.login-submit').on('click', () => {
        let user = $('.login-user').val();
        let password = $('.login-password').val();
        let check = $('.check').val();
        $.post('./api/admin.php', {user, password, check}, (response) => {
            if(response === '1') location.href = './admin.php';
            else alert(response);
        });
    })
</script>