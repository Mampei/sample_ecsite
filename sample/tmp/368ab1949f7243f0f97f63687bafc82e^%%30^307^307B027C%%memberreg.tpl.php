<?php /* Smarty version 2.6.31, created on 2019-05-18 15:40:51
         compiled from memberreg.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'memberreg.tpl', 7, false),)), $this); ?>
<h2>アカウントを作成</h2>

<form action="." method="post">
    <table>
        <tr>
            <td>名前</td>
            <td><input type="text" name="username" value="<?php echo $this->_tpl_vars['form']['username']; ?>
"><?php echo smarty_function_message(array('name' => 'username'), $this);?>
</td>
        </tr>
        <tr>
            <td>フリガナ</td>
            <td><input type="text" name="userfurigana" value="<?php echo $this->_tpl_vars['form']['userfurigana']; ?>
"><?php echo smarty_function_message(array('name' => 'userfurigana'), $this);?>
</td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td><input type="text" name="usermailaddress" value="<?php echo $this->_tpl_vars['form']['usermailaddress']; ?>
"><?php echo smarty_function_message(array('name' => 'usermailaddress'), $this);?>
</td>
        </tr>
        <tr>
            <td>パスワード</td>
            <td><input type="password" name="userpassword" value="" placeholder="最低8文字必要です"><?php echo smarty_function_message(array('name' => 'userpassword'), $this);?>
</td>
        </tr>
        <tr>
            <td>もう一度パスワードを入力してください</td>
            <td><input type="password" name="reuserpassword" value=""><?php echo smarty_function_message(array('name' => 'reuserpassword'), $this);?>
</td>
        </tr>
    </table>
    <p>
    <input type="submit" name="action_memberreg_do" value="アカウントを作成">
    </p>
</form>