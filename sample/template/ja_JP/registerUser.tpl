<div class="registerUser">
<div class="container">
    <h1>アカウントを作成</h1>
    {form ethna_action="registerUser_do"}
    <table>
        <tr>
            <td>名前：</td>
        </tr>
        <tr>
            <td>{form_input name="user_name" value=$form.user_name class="user_name"}<br><span>{message name="user_name"}</span></td>
        </tr>
        <tr>
            <td>フリガナ：</td>
        </tr>
        <tr>
            <td>{form_input name="user_kana" value=$form.user_kana class="user_kana"}<br><span>{message name="user_kana"}</span></td>
        </tr>
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
            <td>{form_input name="password" value="" placeholder="最低8文字必要です" class="password"}<br><span>{message name="password"}</span></td>
        </tr>
        <tr>
            <td>もう一度パスワードを入力してください</td>
        </tr>
        <tr>
            <td>{form_input name="re_password" value="" class="password"}<br><span>{message name="re_password"}</span></td>
        </tr>
    </table>
    <p>
        {form_submit value="アカウントを作成"}
    </p>
    {/form}
    </div>
</div>
</div>

