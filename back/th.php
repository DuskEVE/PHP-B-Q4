
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
    <!-- <tr class="main-type tt">
        <td></td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
    <tr class="sub-type-1 pp ct">
        <td></td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr> -->
</table>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button>新增商品</button>
</div>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="pp">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button><br>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>

<script>

    const addTypeBtn = $('.add-type-btn');

    const newRow = (name, main_id, id) => {
        let row;
        let option = `<td class="ct">
                        <button>修改</button>
                        <button>刪除</button>
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

        $.post('./api/save_type.php', {main_id, name}, () => {
            if(main_id === 0) $('type-list').append(newRow(name, 0));
            else if($(`.sub-type-${main_id}`).length === 0){
                $(`.main-type-${main_id}`).after(newRow(name, main_id));
            }
            else $(`.sub-type-${main_id}`).last().after(newRow(name, main_id));
        });
    };
    const getMainType = () => {
        let main_id = 0;
        $.get('./api/get_type.php', {main_id}, (response) => {
            response = JSON.parse(response);
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
        })
    }

    addTypeBtn.on('click', addType);

    getMainType();
    getTypeList();
</script>