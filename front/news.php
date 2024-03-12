<div class="all">
    <h3 class="ct">最新消息</h3>
    <div class="all list">
        <div class="tt">標題</div>
        <div class="pp news-btn" data-target="news-1">年終特賣會開跑了</div>
        <div class="pp news-btn" data-target="news-2">情人節特惠活動</div>
    </div>
    <div class="all news news-1" style="display:none;">
        <table class="all">
            <tr>
                <td class="tt ct">標題</td>
                <td class="pp">年終特賣會開跑了</td>
            </tr>
            <tr>
                <td class="tt ct">內容</td>
                <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
            </tr>
        </table>
        <div class="ct"><button class="back-btn">返回</button></div>
    </div>
    <div class="all news news-2" style="display:none;">
    <table class="all">
            <tr>
                <td class="tt ct">標題</td>
                <td class="pp">情人節特惠活動</td>
            </tr>
            <tr>
                <td class="tt ct">內容</td>
                <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
            </tr>
        </table>
        <div class="ct"><button class="back-btn">返回</button></div>
    </div>
</div>

<script>
    $('.news-btn').on('click', (event) => {
        let target = $(event.target).data('target');
        $('.list').hide();
        $('.news').hide();
        $(`.${target}`).show();
    });
    $('.back-btn').on('click', () => {
        $('.list').show();
        $('.news').hide();
    });
</script>