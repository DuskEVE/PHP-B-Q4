<div class="all">
    <h2 class="all">會員註冊</h2>
    <h3>會員登入</h3>
    <form action="./api/reg.php" method="post">
        <table style="width: 70%; margin:auto;">
            <tr>
                <td class="tt">姓名</td>
                <td class="pp">
                    <input type="text" name="name" class="user">
                </td>
            </tr>
            <tr>
                <td class="tt">帳號</td>
                <td class="pp">
                    <input type="text" name="user">
                    <input type="button" class="check-user" value="檢測帳號">
                </td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp">
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td class="tt">電話</td>
                <td class="pp">
                    <input type="text" name="phone">
                </td>
            </tr>
            <tr>
                <td class="tt">住址</td>
                <td class="pp">
                    <input type="text" name="addres">
                </td>
            </tr>
            <tr>
                <td class="tt">電子信箱</td>
                <td class="pp">
                    <input type="text" name="email">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="確認"> | 
            <input type="reset" value="重置">
        </div>
    </form>
</div>

<script>
    $('.check-user').on('click', () => {
        let user = $('.user').val();
        $.get('./api/check_user.php', {user}, (response) => {
            if(response === '0') alert('該帳號可以使用');
            else alert('該帳號已被註冊');
        })
    })
</script>