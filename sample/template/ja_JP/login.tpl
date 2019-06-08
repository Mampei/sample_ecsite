<div class="login">
    <h1>ログイン</h1>
    <div class="container">
    {form ethna_action="login_do"}
        {if $app.aError}
        <p class="auth">{message name="authError"}</p>
        {/if}
        <table>
            <tr>
                <td>メールアドレス：</td>
            </tr>
            <tr>
                <td>{form_input name="mailaddress" value=$form.mailaddress class="mailaddress"}<br><span>{message name="mailaddress"}</span></td>
            </tr>
            <tr>
                <td>パスワード：</td>
            </tr>
            <tr>
                <td>{form_input name="password" class="password"}<br><span>{message name="password"}</span></td>
            </tr>
        </table>
        <p>
            {form_submit value="ログイン" class="submit"}
        </p>
    {/form}
    </div>
</div>
