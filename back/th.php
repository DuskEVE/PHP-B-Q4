<div class="all">
    <h3 class="ct">商品分類</h3>
    <div class="ct">
        新增大分類 <input type="text" class="main-name"> <button class="add-main-btn">新增</button>
    </div>
    <div class="ct">
        新增中分類 
        <select name="" class="main-list">
            <?php
            $mains = $Type->searchAll(['main_id'=>0]);
            foreach($mains as $main){
                echo "<option value='{$main['id']}'>{$main['name']}</option>";
            }
            ?>
        </select> 
        <input type="text" class="sub-name"> 
        <button class="add-sub-btn">新增</button>
    </div>
    <div class="type-list">
        <table class="all">
        <?php
        $mains = $Type->searchAll(['main_id'=>0]);
        foreach($mains as $main){
            $subs = $Type->searchAll(['main_id'=>$main['id']]);
        ?>
        <tr>
            <td class="tt" style="width: 70%;"><?=$main['name']?></td>
            <td class="tt ct">
                <button onclick="location.href='?do=edit_type&id=<?=$main['id']?>'">修改</button>
                <button class="del-type" data-id="<?=$main['id']?>">刪除</button>
            </td>
        </tr>
        <?php
            foreach($subs as $sub){
            ?>
            <tr>
                <td class="pp ct" style="width: 70%;"><?=$sub['name']?></td>
                <td class="pp ct">
                    <button onclick="location.href='?do=edit_type&id=<?=$sub['id']?>'">修改</button>
                    <button class="del-type" data-id="<?=$sub['id']?>">刪除</button>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </table>
    </div>

</div>

<script>
    const getType = () => {
        $.get('./api/get_type.php', {main_id: 0}, (response) => {
            $('.type-list').empty().append(response);
        })
    }

    $('.add-main-btn').on('click', () => {
        let name = $('.main-name').val();
        let main_id = 0;
        $.post('./api/add_type.php', {name, main_id}, () => location.reload())
    });
    $('.add-sub-btn').on('click', () => {
        let name = $('.sub-name').val();
        let main_id = $('.main-list').val();
        $.post('./api/add_type.php', {name, main_id}, () => location.reload())
    });
    $('.del-type').on('click', (event) => {
        const target = $(event.target);
        let id = target.data('id');
        $.post('./api/del_type.php', {id}, () => target.parent().parent().remove());
    });

</script>