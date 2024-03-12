<?php
$type = $Type->search(['id'=>$_GET['id']]);
?>

<div class="all">
    <h2 class="ct">修改分類名稱</h2>
    <form action="./api/edit_type.php" method="post" style="display: flex; flex-wrap: wrap;">
        <input type="hidden" name="id" value="<?=$type['id']?>">
        <table class="all ct">
            <tr>
                <td class="tt" style="width: 30%;">分類名稱</td>
                <td class="pp">
                    <input type="text" name="name" style="width: 90%;" value="<?=$type['name']?>">
                </td>
            </tr>
        </table>
        <div class="ct all">
            <input type="submit" value="編輯">
            <input type="reset" value="重置">
        </div>
    </form>
</div>