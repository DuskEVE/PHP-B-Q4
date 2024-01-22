<h2>第一次購買</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">
<h2>會員登入</h2>
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
    <button>確認</button>
</div>