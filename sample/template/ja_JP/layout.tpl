<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/normalize.css" type="text/css" />
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<link rel="stylesheet" href="css/registerUser.css" type="text/css" />
<link rel="stylesheet" href="css/login.css" type="text/css" />
<link rel="stylesheet" href="css/registerAddress.css" type="text/css" />
<link rel="stylesheet" href="css/showAccount.css" type="text/css" />
<link rel="stylesheet" href="css/search.css" type="text/css" />
<link rel="stylesheet" href="css/search/detail.css" type="text/css" />
<link rel="stylesheet" href="css/confirmAddtion.css" type="text/css" />
<link rel="stylesheet" href="css/showCart.css" type="text/css" />
<link rel="stylesheet" href="css/order.css" type="text/css" />
<title>木山商店</title>
</head>
<body>


<div class="header">
    <div class="header-logo"><a href="http://localhost:8000">Kiyama</a></div>
    <div class="header-search">
        <form class="form1" action="." method="POST">
            <input type="hidden" name="start" value="0">
            <input class="sbox" type="text" name="item_name" value="{$form.item}" placeholder="キーワードを入力" >
            <input class="sbtn" type="submit" name="action_search" value="検索" >
        </form>
    </div>
    {if isset($smarty.session)}
    <div class="header-list">
        <ul>
            <li class="sc"><a href="?action_showCart=true">カートへ</a></li>
            {if $smarty.session.state == 0}
            <li class="rua"><a href="?action_registerAddress=true&user_id={$smarty.session.user_id}"><span>{$smarty.session.user_name}さん</span><br>アカウント</a></li>
            {else}
            <li class="rua"><a href="?action_showAccount=true&user_id={$smarty.session.user_id}"><span>{$smarty.session.user_name}さん</span></br>アカウント</a></li>
            {/if}
            <li class="l"><a href="?action_logout=true">ログアウト</a></li>
        </ul>
    </div>
    {else}
    <div class="header-list">
        <ul>
            <li class="sc"><a href="?action_login=true">カートへ</a></li>
            <li class="ru"><a href="?action_registerUser=true">会員登録は<br>こちら</a></li>
            <li class="l"><a href="?action_login=true">ログイン</a></li>
        </ul>
    </div>
    {/if}
</div>


<div id="main">
{$content}
</div>


<div id="footer">
    Powered By Ethnam.
</div>
</body>
</html>
