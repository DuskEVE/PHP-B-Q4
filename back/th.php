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
            <th class="tt" style="width: 70%;"><?=$main['name']?></th>
            <th class="tt ct">
                <button onclick="location.href='?do=edit_type&id=<?=$main['id']?>'">修改</button>
                <button class="del-type" data-id="<?=$main['id']?>">刪除</button>
            </th>
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

    <h3 class="ct">商品管理</h3>
    <div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
    <table class="all">
        <tr class="tt">
            <th style="width: 15%;">編號</th>
            <th style="width: 30%;">商品名稱</th>
            <th style="width: 10%;">庫存量</th>
            <th style="width: 15%;">狀態</th>
            <th style="width: 30%;">操作</th>
        </tr>
        <?php
        $allGoods = $Goods->searchAll();
        foreach($allGoods as $goods){
        ?>
        <tr class="pp ct">
            <td><?=$goods['no']?></td>
            <td><?=$goods['name']?></td>
            <td><?=$goods['stock']?></td>
            <td id="display-<?=$goods['id']?>"><?=$goods['display']==1?"販售中":"已下架"?></td>
            <td>
                <button onclick="location.href='?do=edit_goods&id=<?=$goods['id']?>'">修改</button>
                <button class="del-goods" data-id="<?=$goods['id']?>">刪除</button>
                <button class="display-btn" data-id="<?=$goods['id']?>" data-display="1">上架</button>
                <button class="display-btn" data-id="<?=$goods['id']?>" data-display="0">下架</button>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>

<script>

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

    $('.del-goods').on('click', (event) => {
        let id = $(event.target).data('id');
        $.post('./api/del_type.php', {id}, () => target.parent().parent().remove());
    });
    $('.display-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        let display = $(event.target).data('display');
        $.post('./api/display_goods.php', {id, display}, () => {
            if(display===1) $(`#display-${id}`).text('販售中');
            else $(`#display-${id}`).text('已下架');
        })
    });
</script>