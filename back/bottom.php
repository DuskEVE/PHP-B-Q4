<?php
$bottom = $Bottom->searchAll()[0];
?>
<div class="all">
    <h2 class="ct">編輯頁尾版權區</h2>
    <form action="./api/bottom.php" method="post" style="display: flex; flex-wrap: wrap;">
        <input type="hidden" name="id" value="<?=$bottom['id']?>">
        <table class="all ct">
            <tr>
                <td class="tt" style="width: 30%;">頁尾宣告內容</td>
                <td class="pp">
                    <input type="text" class="bottom" name="text" style="width: 90%;" value="<?=$bottom['text']?>">
                </td>
            </tr>
        </table>
        <div class="ct all">
            <input type="submit" value="編輯">
            <input type="button" class="reset-btn" value="重置">
        </div>
    </form>
</div>

<script>
    $('.reset-btn').on('click', () => {
        $('.bottom').val('');
    })
</script>