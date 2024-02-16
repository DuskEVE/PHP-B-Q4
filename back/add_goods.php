
<h2 class="ct">新增商品</h2>
<form action="" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt ct">所屬大分類</th>
            <td class="pp">
                <select name="" id="main-type">
                    
                </select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">所屬中分類</th>
            <td class="pp">
                <select name="" id="sub-type">

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
                <input type="text" name="" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品價格</th>
            <td class="pp">
                <input type="text" name="" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">規格</th>
            <td class="pp">
                <input type="text" name="" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">庫存量</th>
            <td class="pp">
                <input type="text" name="" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品圖片</th>
            <td class="pp">
                <input type="file" name="" id="">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品介紹</th>
            <td class="pp">
                <textarea name="" id="" style="width: 80%; height: 150px;"></textarea>
            </td>
        </tr>
    </table>
</form>

<script>
    const mainType = $('#main-type');
    const subType = $('sub-type');

    const getType = (mainId) => {
        $.get('./api/get_type.php', {main_id: mainId}, (response) => {
            let types = JSON.parse(response);
            let target = null;

            if(mainId === 0) target = $('#main-type');
            else target = $('#sub-type');
            types.foreach(type => {
                let element = `
                <option value="${type['id']}">${type['name']}</option>
                `;
                target.append(element);
            });
        });

        mainType.on('change', () => {

        })

        getType(0);
    };

</script>