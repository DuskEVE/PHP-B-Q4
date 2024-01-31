<h2 class="ct">修改管理員權限</h2>
<?php
$admin = $Admin->search(['id'=>$_GET['id']]);
$pr = unserialize($admin['pr'])
?>

<form action="./api/save_admin.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="text" name="user" id="user" value="<?=$admin['user']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <input type="password" name="password" id="password" value="<?=$admin['password']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div>
                    <input type="checkbox" name="pr[]" value="1" <?=in_array(1, $pr)?"checked":""?>>商品分類與管理
                </div>
                <div>
                    <input type="checkbox" name="pr[]" value="2" <?=in_array(2, $pr)?"checked":""?>>訂單管理
                </div>
                <div>
                    <input type="checkbox" name="pr[]" value="3" <?=in_array(3, $pr)?"checked":""?>>會員管理
                </div>
                <div>
                    <input type="checkbox" name="pr[]" value="4" <?=in_array(4, $pr)?"checked":""?>>頁尾版權區管理
                </div>
                <div>
                    <input type="checkbox" name="pr[]" value="5" <?=in_array(5, $pr)?"checked":""?>>最新消息管理
                </div>
            </td>
        </tr>
    </table>

    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
    </div>
</form>