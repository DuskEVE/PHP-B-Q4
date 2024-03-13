<div class="all">
    <h2 class="all">會員註冊</h2>

    <div>
        <table style="width: 70%; margin:auto;">
            <tr>
                <td class="tt">姓名</td>
                <td class="pp">
                    <input type="text" id="name" class="name">
                </td>
            </tr>
            <tr>
                <td class="tt">帳號</td>
                <td class="pp">
                    <input type="text" id="user">
                    <input type="button" class="check-user" value="檢測帳號">
                </td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp">
                    <input type="password" id="password">
                </td>
            </tr>
            <tr>
                <td class="tt">電話</td>
                <td class="pp">
                    <input type="text" id="phone">
                </td>
            </tr>
            <tr>
                <td class="tt">住址</td>
                <td class="pp">
                    <input type="text" id="addres">
                </td>
            </tr>
            <tr>
                <td class="tt">電子信箱</td>
                <td class="pp">
                    <input type="text" id="email">
                </td>
            </tr>
        </table>
        <div class="ct">
            <button class="submit-btn">確認</button>|
            <button class="reset-btn">重置</button>
        </div>
    </div>
</div>

<script>
    $('.check-user').on('click', () => {
        let user = $('#user').val();
        if(user === 'admin') alert('不可使用admin作為帳號');
        else{
            $.get('./api/check_user.php', {user}, (response) => {
                if(response === '0') alert('該帳號可以使用');
                else alert('該帳號已被註冊');
            })
        }
    })
    $('.submit-btn').on('click', () => {
        let data = {
            name: $('#name').val(),
            user: $('#user').val(),
            password: $('#password').val(),
            phone: $('#phone').val(),
            addres: $('#addres').val(),
            email: $('#email').val()
        };

        if(data.user === 'admin') alert('不可使用admin作為帳號');
        else{
            $.post('./api/reg.php', data, (response) => {
                if(response === '1') location.href = './index.php'
                else alert(response);
            });
        };
    });
    $('.reset-btn').on('click', () => {
        $('#name').val('');
        $('#user').val('');
        $('#password').val('');
        $('#phone').val('');
        $('#addres').val('');
        $('#email').val('');
    });
</script>