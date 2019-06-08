    <div class="search_detail">
        <div class="search_detail_left">
            <div class="image">
                <img src="{$app.item[0][9]}">
             </div>
            <div class="detail">
                <div class="name">
                    <strong>{$app.item[0][1]}</strong>
                </div>
                <p class="price"><span>価格：</span>¥ {$app.item[0][6]|number_format}</p>
                <p class="stock"><span>残り：</span>{$app.stock}個</p>
                <div class="description">
                    <p>{$app.item[0][10]}</p>
                </div>
            </div>
        </div>

        <div class="search_detail_right">
            <p class="price"><span>¥ </span>{$app.item[0][6]|number_format}</p>
            <p class="date"><strong>{$app.date}</strong>にお届け予定です</p>
            <p>
            {form ethna_action="confirmAddtion"}
                数量：{form_input name="purchase_quantity"}<br>
                {form_input name="item_id" value=$app.item[0][0]}
                {form_input name="item_name" value=$app.item[0][1]}
                {form_input name="list_price" value=$app.item[0][6]}
                {form_input name="image_url" value=$app.item[0][9]}
                {form_submit value="カートに入れる" class="cart"}
            {/form}
            </p>
            <strong>{message name="stockError"}</strong>
        </div>
    </div>
