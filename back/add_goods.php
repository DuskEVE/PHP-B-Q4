
<h2 class="ct">新增商品</h2>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt ct">所屬大分類</th>
            <td class="pp">
                <select name="main" id="main-type">
                    
                </select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">所屬中分類</th>
            <td class="pp">
                <select name="sub" id="sub-type">

                </select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品編號</th>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <th class="tt ct">商品名稱</th>
            <td class="pp">
                <input type="text" name="name" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品價格</th>
            <td class="pp">
                <input type="text" name="price" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">規格</th>
            <td class="pp">
                <input type="text" name="spec" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">庫存量</th>
            <td class="pp">
                <input type="text" name="stock" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品圖片</th>
            <td class="pp">
                <input type="file" name="file" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品介紹</th>
            <td class="pp">
                <textarea name="intro" id="" style="width: 80%; height: 150px;"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">|
        <input type="reset" value="重置">|
        <button onclick="location.href='?do=th'">返回</button>
    </div>
</form>

<script>
    const mainType = $('#main-type');
    const subType = $('sub-type');

    const getType = (mainId) => {
        $.get('./api/get_type.php', {main_id: mainId}, (response) => {
            let types = Array.from(JSON.parse(response));
            let target = null;

            if(mainId === 0) target = $('#main-type');
            else target = $('#sub-type');
            types.forEach(type => {
                let element = `
                <option value="${type['id']}">${type['name']}</option>
                `;
                target.append(element);
            });
            if(mainId === 0) getType(Number(mainType.val()));
        });
    };

    mainType.on('change', () => {
        let mainId = Number(mainType.val());
        getType(mainId);
    })

    getType(0);
</script>