<h2 class="ct">新增管理帳號</h2>
    <form action="./api/add_admin.php" method="post">
        <table class="all ct">
            <tr>
                <td class="tt">帳號</td>
                <td class="pp">
                    <input type="text" name="user">
                </td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp">
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td class="tt">權限</td>
                <td class="pp">
                    <input type="checkbox" name="level[]" value="1">商品分類與管理<br>
                    <input type="checkbox" name="level[]" value="2">訂單管理<br>
                    <input type="checkbox" name="level[]" value="3">會員管理<br>
                    <input type="checkbox" name="level[]" value="4">頁尾版權區管理<br>
                    <input type="checkbox" name="level[]" value="5">最新消息管理
                </td>
            </tr>
        </table>
        <div class="all ct">
            <input type="submit" value="送出">
            <input type="reset" value="重置">
        </div>
    </form>