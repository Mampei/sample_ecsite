<div class="showAccount">
    <h2>住所</h2>
    <div class="container">
        <p>{$smarty.session.user_name}</p>
        <p>{$app.postal_code}</p>
        <p>{$app.xmpf}</p>
        <p>{$app.address}</p>
        <p>{$app.phone_number}</p>
        <p>
        {form ethna_action="showAccount_delete"}
            {form_submit value="削除"}
        {/form}
        </p>
    </div>
</div>

