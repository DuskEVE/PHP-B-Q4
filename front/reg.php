
<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="user" id="user">
            <button onclick="checkUser()">檢查帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="password" id="password"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="phone" id="phone"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="address" id="address"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">確認</button>
    <button onclick="inputReset()">重置</button>
</div>

<script>

function checkUser(){
    let user = $('#user').val();
    $.get('./api/check_user.php', {user}, (response) => {
        if(parseInt(response)===1 || user==='admin') alert("此帳號已被註冊!");
        else alert("此帳號可以使用");
    })
}
function inputReset(){
    $("#name,#user,#password,#phone,#address,#email").val('');
}
function reg(){
    let account = {
        name:$('#name').val(),
        user:$('#user').val(),
        password:$('#password').val(),
        phone:$('#phone').val(),
        address:$('#address').val(),
        email:$('#email').val()
    };
    $.get('./api/check_user.php', {user:account.user}, (response) => {
        if(parseInt(response)===1 || user==='admin') alert(`此帳號${account.user}已被註冊!`);
        else{
            $.post('./api/reg.php', account, () => {
                console.log('bruh');
                location.href='?do=login';
            });
        }
    })
}

</script>