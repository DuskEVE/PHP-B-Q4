
<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" id="main-type">
    <button class="add-type-btn" data-type="main">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="main_id" id="main_id">

    </select>
    <input type="text" id="sub-type">
    <button class="add-type-btn" data-type="sub">新增</button>
</div>

<table class="all type-list">

</table>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button class="add-goods-btn">新增商品</button>
</div>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $goods = $Goods->searchAll();
    foreach($goods as $good){
    ?>
    <tr class="pp">
        <td><?=$good['no']?></td>
        <td><?=$good['name']?></td>
        <td><?=$good['stock']?></td>
        <td id="display-<?=$good['id']?>"><?=$good['display']==1?"上架":"下架"?></td>
        <td class="ct">
            <button class="edit-goods-btn" data-id="<?=$good['id']?>">修改</button>
            <button class="del-goods-btn" data-id="<?=$good['id']?>">刪除</button><br>
            <button class="show-goods-btn" data-id="<?=$good['id']?>">上架</button>
            <button class="hide-goods-btn" data-id="<?=$good['id']?>">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    const addTypeBtn = $('.add-type-btn');
    const addGoodsBtn = $('.add-goods-btn');
    const showGoodsBtn = $('.show-goods-btn');
    const hideGoodsBtn = $('.hide-goods-btn');

    const newRow = (name, main_id, id) => {
        let row;
        let option = `<td class="ct">
                        <button>修改</button>
                        <button class='type-del-btn' data-id='${id}'>刪除</button>
                      </td>`;
        if(main_id===0){
            row = `
                <tr class="main-type main-type-${id} tt">
                    <td>${name}</td>
                    ${option}
                </tr>`;
        }
        else{
            row = `
                <tr class="sub-type-${main_id} pp ct">
                    <td>${name}</td>
                    ${option}
                </tr>`;
        }
        return row
    };
    const addType = (event) => {
        let type = $(event.target).data('type');
        let main_id = (type === 'main'? 0:$('#main_id').val());
        let name = (type === 'main'? $('#main-type').val():$('#sub-type').val());

        // 這裡save_type.php 回傳的 response 會是新增資料的id
        $.post('./api/save_type.php', {main_id, name}, (response) => {
            if(main_id === 0){
                $('.type-list').append(newRow(name, 0, response));
                getMainType();
            }
            else if($(`.sub-type-${main_id}`).length === 0){
                $(`.main-type-${main_id}`).after(newRow(name, main_id, response));
            }
            else $(`.sub-type-${main_id}`).last().after(newRow(name, main_id, response));
        });
    };
    const getMainType = () => {
        let main_id = 0;
        $.get('./api/get_type.php', {main_id}, (response) => {
            response = JSON.parse(response);
            $('#main_id').empty();
            for(let i=0; i<response.length; i++){
                let option = `<option value='${response[i].id}'>${response[i].name}</option>`;
                $('#main_id').append(option);
            }
        });
    };
    const getTypeList = () => {
        $.get('./api/get_type.php', {}, (response) => {
            response = JSON.parse(response)
            let main = Array.from(response).filter(element => element.main_id === 0);
            let sub = Array.from(response).filter(element => element.main_id !== 0);

            main.forEach(element => $('.type-list').append(newRow(element.name, 0, element.id)));
            let visited = [];
            sub.forEach((element, index) => {
                if(visited.indexOf(element.main_id) === -1){
                    $(`.main-type-${element.main_id}`).after(newRow(element.name, element.main_id));
                    visited.push(element.main_id);
                }
                else $(`.sub-type-${element.main_id}`).last().after(newRow(element.name, element.main_id))
            });

            $('.type-del-btn').on('click', delType);
        })
    }
    const delType = (event) => {
        let id = $(event.target).data('id');
        let table = 'type';
        $.post('./api/del.php', {id, table}, () => {
            $(event.target).parent().parent().remove();
            getMainType();
        });
    };
    const showGoods = (event) => {
        let id = $(event.target).data('id');
        $.post('./api/display_goods.php', {id, display: 1}, () => $(`#display-${id}`).text('上架'))
    };
    const hideGoods = (event) => {
        let id = $(event.target).data('id');
        $.post('./api/display_goods.php', {id, display: 0}, () => $(`#display-${id}`).text('下架'))
    };

    addTypeBtn.on('click', addType);
    addGoodsBtn.on('click', () => location.href = '?do=add_goods')
    showGoodsBtn.on('click', showGoods);
    hideGoodsBtn.on('click', hideGoods);

    getMainType();
    getTypeList();
</script>