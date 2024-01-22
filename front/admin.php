
<h2>管理員登入</h2>
<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="user" id="user"></td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="password" id="password"></td>
    </tr>
    <tr>
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
            $num1 = rand(10, 99);
            $num2 = rand(10, 99);
            $_SESSION['ans'] = $num1 + $num2;
            echo "$num1 + $num2 = ";
            ?>
            <input type="text" name="check" id="check">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('admin')">確認</button>
</div>

<script>
    function login(table){
        $.get('./api/check_ans.php', {ans:$('#check').val()}, (response) => {
            if(parseInt(response)===0) alert('驗證碼錯誤，請重新輸入');
            else{
                $.post('./api/check_account.php', 
                {user:$('#user').val(),
                 password:$('#password').val(),
                 table}, (response) => {
                    if(parseInt(response) === 0) alert('帳號或密碼錯誤，請重新輸入');
                    else{
                        if(table === 'member')location.href = './index.php';
                        else if(table === 'admin')location.href = './admin.php';
                    }
                });
            }
        })
    }

</script>