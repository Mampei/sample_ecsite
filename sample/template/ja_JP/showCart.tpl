{if $app.nError == 0}
<h1 class="showCart_h">ショッピングカート</h1>

<div class="showCart">
    <div class="showCart_left">
        {assign var=count value=0}
        {section name=index loop=$app.cart_list }
            <div class="cart">
                <div class="item">
                    <div class="image">
                        <a href="?action_search_detail=true&item_id={$app.cart_list[index][1]}&item_name={$app.cart_list[index][2]}"><img src="{$app.cart_list[index][4]}"></a>
                    </div>
                    <div class="detail">
                        <div>
                            <strong>
                                <a href="?action_search_detail=true&item_id={$app.cart_list[index][1]}&item_name={$app.cart_list[index][2]}">{$app.cart_list[index][2]}</a>
                            </strong>
                        </div>
                        <div>残り：{$app.quantity[$count]}個</div>
                        <div class="delete">
                            {form ethna_action="showCart_deleteItem" }
                                {form_input name="delete_item" value=$app.cart_list[index][1]}
                                {form_submit value="削除" }
                            {/form}
                        </div>
                    </div>
                </div>
                <div class="price">
                    <div>価格：</div>  
                    <p>¥ {$app.cart_list[index][3]|number_format}</p>
                </div>
                <div class="quantity">
                    <div>数量：</div>
                    <div class="btn">
                        {form ethna_action="showCart_updateQuantity"}<br>
                            {form_input name="purchase_quantity" default=$app.cart_list[index][5]}
                            {form_input name="update_item" value=$app.cart_list[index][1]}
                            {form_submit value="変更"}
                        {/form}
                    </div>
                </div>
            </div>
        {assign var=count value=$count+1}
        {/section}
    </div>

    <div class="showCart_right">
        <div class="container">
            <p class="payment">小計：¥ {$app.payment}</p>
            {if $smarty.session.state == 1}    
            <p><a class="btn" href="?action_order=true">レジに進む</a></p>
            {else}
            <p><a class="btn" href="?action_registerAddress=true">レジに進む</a></p>
            {/if}
        </div>
    </div>
</div>

{else}
<h1 class="showCart_h">{message name="cartError"}</h1>
{/if}

