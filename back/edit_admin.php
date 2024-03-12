<?php
$admin = $Admin->search(['id'=>$_GET['id']]);
$level = explode(",", $admin['level']);
?>

<h2 class="ct">新增管理帳號</h2>
    <form action="./api/add_admin.php" method="post">
        <input type="hidden" name="id" value="<?=$admin['id']?>">
        <table class="all ct">
            <tr>
                <td class="tt">帳號</td>
                <td class="pp">
                    <input type="text" name="user" value="<?=$admin['user']?>">
                </td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp">
                    <input type="password" name="password" value="<?=$admin['password']?>">
                </td>
            </tr>
            <tr>
                <td class="tt">權限</td>
                <td class="pp">
                    <input type="checkbox" name="level[]" value="1" <?=in_array('1', $level)?"checked":""?>>商品分類與管理<br>
                    <input type="checkbox" name="level[]" value="2" <?=in_array('2', $level)?"checked":""?>>訂單管理<br>
                    <input type="checkbox" name="level[]" value="3" <?=in_array('3', $level)?"checked":""?>>會員管理<br>
                    <input type="checkbox" name="level[]" value="4" <?=in_array('4', $level)?"checked":""?>>頁尾版權區管理<br>
                    <input type="checkbox" name="level[]" value="5" <?=in_array('5', $level)?"checked":""?>>最新消息管理
                </td>
            </tr>
        </table>
        <div class="all ct">
            <input type="submit" value="送出">
            <input type="reset" value="重置">
        </div>
    </form>