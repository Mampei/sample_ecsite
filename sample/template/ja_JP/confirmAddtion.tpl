    <div class="confirmAddtion">
        <div class="image">
            <img src="{$form.image_url}">
            <p>追加されました</p>
        </div>
        <div class="payment">
            <p><span>小計：</span>¥ {$app.payment}</p>
        </div>
        <div class="btn">
            <ul>
                <li><a class="cart" href="?action_showCart=true">カートを編集</a></li>
                {if $smarty.session.state == 1}
                <li><a class="regi" href="?action_payment&user_id={$smarty.session.user_id}">レジに進む</a></li>
                {else}
                <li><a class="regi" href="?action_registerAddress=true">レジに進む</a></li>
                {/if}
            </ul>
        </div>
    </div>



        

