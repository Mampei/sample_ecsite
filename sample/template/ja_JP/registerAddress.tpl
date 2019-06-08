    {if $smarty.session.state == 0}
    <div class="registerAddress">
        <div class="registerAddress_top">
            <h1>新しいお届け先を登録してください</h1>
            <p>必要事項を入力し、<span>「登録する」</span>ボタンをクリックしてください。</p>
            <p>※特殊文字は使用できません</p>
        </div>

        {if $app.nError > 0 }
        <div class="registerAddress_center">
            <p>エラーメッセージ</p>
            <ul>
                {if is_error('postal_code_former') or is_error('postal_code_latter') }
                    <li>郵便番号には7けたの半角数字を入力してください</li>
                {/if}
                {if is_error('xmpf') }
                    <li>{message name="xmpf"}</li>
                {/if}
                {if is_error('address') }
                    <li>{message name="address"}</li>
                {/if}
                {if is_error('phone_number') }
                    <li>{message name="phone_number"}</li>
                {/if}
            </ul>
        </div>
        {/if}

        <div class="registerAddress_bottom">
            {form ethna_action="registerAddress_do"}
            <table>
                <tr>
                    <td>郵便番号:</td>
                </tr>
                <tr>
                    <td>{form_input name="postal_code_former" class="postal_code_former"}-{form_input name="postal_code_latter" class="postal_code_latter"}</td>
                </tr>
                <tr>
                    <td>都道府県:</td>
                </tr>
                <tr>
                    <td>{form_input name="xmpf" class="xmpf"}</td>
                </tr>
                <tr>
                    <td>住所:</td>
                </tr>
                <tr>
                    <td>{form_input name="address" class="address"}</td>
                </tr>
                <tr>
                    <td>電話番号:</td>
                </tr>
                <tr>
                    <td>{form_input name="phone_number" class="phone_number"}</td>
                </tr>
            </table>
            <p>{form_submit value="登録する" class="submit"}</p>
            {/form}
        </div>
    </div>
    {else}
    <div>
        <p>登録が完了しました</p>
    </div>
    {/if}

