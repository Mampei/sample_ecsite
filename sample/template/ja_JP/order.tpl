    <div class="order">
        <h1>注文内容の確認・変更</h1>
        <div class="container">
        <div class="left">
            <div class="left_top">
                <table>
                    <tr>
                        <td><strong>お届け先住所</strong></td>
                    </tr>
                    <tr>
                        <td>{$smarty.session.user_name}</td>
                    </tr>
                    <tr>
                        <td>{$app.postal_code}</td>
                    </tr>
                    <tr>
                        <td>{$app.xmpf} {$app.address}</td>
                    </tr>
                    <tr>
                        <td>電話番号：{$app.phone_number}</td>
                    </tr>
                </table>
            </div>

            <div class="left_bottom">
                {assign var=count value=0}
                {section name=index loop=$app.cart_list}
                <div class="item">
                    <div class="image">
                        <img src="{$app.cart_list[index][4]}">
                    </div>
                    <div class="detail">
                        <table>
                            <tr>
                                <td class="item_name">{$app.cart_list[index][2]}</td>
                            </tr>
                            <tr>
                                <td>価格：¥ {$app.cart_list[index][3]|number_format}</td>
                            </tr>
                            <tr>
                                <td>数量：{$app.cart_list[index][5]} <span>{message name="quantityError[$count]"}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                {assign var=count value=$count+1}
                {/section}
            </div>
        </div>

        <div class="right">
            <div class="btn">
                {form ethna_action="order_do"}
                    {form_submit value="注文を確定する"}
                {/form}
            </div>
            <div class="payment">
                <table>
                    <tr>
                        <td>注文内容</td>
                    </tr>
                    <tr>
                        <td>商品の小計：<span>¥ {$app.payment}</span></td>
                    </tr>
                    <tr>
                        <td>配送料・手数料：<span>¥ {$app.deliveryFee}</span>
                    </tr>
                </table>
            </div>
            <div class="totalPayment">
                <p><strong>ご請求額：¥ {$app.totalPayment}</strong><p>
            </div>
        </div>
        </div>
    </div>

