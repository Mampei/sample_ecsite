<div class="search">
    {if $app.Error == 0}
    <div class="container">
        {section name=index loop=$app.item start=$form.start max=$app.count}
        <div class="item">
            <a class="image" href="?action_search_detail=true&item_id={$app.item[index][0]}&name={$app.item[index][1]}">
                <img class="item_img" src="{$app.item[index][9]}">
            </a>
            <p>
                <a class="name" href="?action_search_detail=true&item_id={$app.item[index][0]}&name={$app.item[index][1]}">{$app.item[index][1]}</a>
            </p>
            <p>
                <a class="price" href="?action_search_detail=true&item_id={$app.item[index][0]}&name={$app.item[index][1]}"><span>¥ </span>{$app.item[index][6]}</a>
            </p>
        </div>
        {/section}
    </div>

    <div class="pager">
        <div class="container">
    {if $app.hasprev}
        <a href="{$app.link}&start=0">最初</a>&nbsp;<a href="{$app.link}&start={$app.prev}">&lt;&lt;</a>
    {else}
        最初&nbsp;&lt;&lt;
    {/if}
    {foreach from=$app.pager item=page}
        {if $page.offset == $app.current}
            <strong>{$page.index}</strong>
        {else}
            <a href="{$app.link}&start={$page.offset}">{$page.index}</a>
        {/if}
        &nbsp;
    {/foreach}
    {if $app.hasnext}
        <a href="{$app.link}&start={$app.next}">&gt;&gt;</a>
        &nbsp;<a href="{$app.link}&start={$app.last}">最後</a>
    {else}
        &gt;&gt;&nbsp;最後
    {/if}
        </div>
    </div>
</div>

{else}
<h1>{message name="itemError"}</h1>
{/if}
