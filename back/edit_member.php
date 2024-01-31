<h2 class="ct">會員管理</h2>
<?php
$member = $Member->search(['id'=>$_GET['id']]);
?>

<form action="./api/reg.php" method="post">
    <input type="hidden" name="id" value="<?=$member['id']?>">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?=$member['user']?></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?=str_repeat('*', strlen($member['password']))?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$member['name']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="phone" id="phone" value="<?=$member['phone']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="address" id="address" value="<?=$member['address']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$member['email']?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="修改">|
        <input type="reset" value="重置">|
        <button onclick="location.href='./admin.php?do=mem'">取消</button>
    </div>
</form>