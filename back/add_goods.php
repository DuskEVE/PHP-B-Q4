
<style>
    input[type=text], input[type=number], textarea{
        width: 90%;
    }
</style>
<div class="all">
    <h2>新增商品</h2>
    <form action="./api/add_goods.php" method="post" enctype="multipart/form-data">
        <table class="all">
            <tr>
                <td class="tt ct" style="width: 40%;">所屬大分類</td>
                <td class="pp">
                    <select name="main_id" class="main-list">

                    </select>
                </td>
            </tr>
            <tr>
                <td class="tt ct">所屬中分類</td>
                <td class="pp">
                    <select name="sub_id" class="sub-list">

                    </select>
                </td>
            </tr>
            <tr>
                <td class="tt ct">商品編號</td>
                <td class="pp">完成分類後自動分配</td>
            </tr>
            <tr>
                <td class="tt ct">商品名稱</td>
                <td class="pp"><input type="text" name="name"></td>
            </tr>
            <tr>
                <td class="tt ct">商品價格</td>
                <td class="pp"><input type="number" name="price"></td>
            </tr>
            <tr>
                <td class="tt ct">規格</td>
                <td class="pp"><input type="text" name="spec"></td>
            </tr>
            <tr>
                <td class="tt ct">庫存量</td>
                <td class="pp"><input type="number" name="stock"></td>
            </tr>
            <tr>
                <td class="tt ct">商品圖片</td>
                <td class="pp"><input type="file" name="file"></td>
            </tr>
            <tr>
                <td class="tt ct">商品介紹</td>
                <td class="pp">
                    <textarea name="intro" style="height: 100px;"></textarea>
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">|
            <input type="reset" value="重置">|
            <input type="button" onclick="location.href='?do=th'" value="返回">
        </div>
    </form>
</div>

<script>
    const mainList = $('.main-list');
    const subList = $('.sub-list');
    const getType = (main_id, target) => {
        $.get('./api/get_type.php', {main_id}, (response) => {
            target.html(response);
            if(main_id === 0) getType(mainList.val(), subList);
        })
    }

    mainList.on('change', () => {
        getType(mainList.val(), subList);
    })

    getType(0, mainList);
</script>