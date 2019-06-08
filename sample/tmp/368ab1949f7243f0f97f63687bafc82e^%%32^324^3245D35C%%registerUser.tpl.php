<?php /* Smarty version 2.6.31, created on 2019-06-03 07:33:30
         compiled from registerUser.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'registerUser.tpl', 4, false),array('function', 'form_input', 'registerUser.tpl', 10, false),array('function', 'message', 'registerUser.tpl', 10, false),array('function', 'form_submit', 'registerUser.tpl', 38, false),)), $this); ?>
<div class="registerUser">
<div class="container">
    <h1>アカウントを作成</h1>
    <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'registerUser_do')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <table>
        <tr>
            <td>名前：</td>
        </tr>
        <tr>
            <td><?php echo smarty_function_form_input(array('name' => 'user_name','value' => $this->_tpl_vars['form']['user_name'],'class' => 'user_name'), $this);?>
<br><span><?php echo smarty_function_message(array('name' => 'user_name'), $this);?>
</span></td>
        </tr>
        <tr>
            <td>フリガナ：</td>
        </tr>
        <tr>
            <td><?php echo smarty_function_form_input(array('name' => 'user_kana','value' => $this->_tpl_vars['form']['user_kana'],'class' => 'user_kana'), $this);?>
<br><span><?php echo smarty_function_message(array('name' => 'user_kana'), $this);?>
</span></td>
        </tr>
        <tr>
            <td>メールアドレス：</td>
        </tr>
        <tr>
            <td><?php echo smarty_function_form_input(array('name' => 'mailaddress','value' => $this->_tpl_vars['form']['mailaddress'],'class' => 'mailaddress'), $this);?>
<br><span><?php echo smarty_function_message(array('name' => 'mailaddress'), $this);?>
</span></td>
        </tr>
        <tr>
            <td>パスワード：</td>
        </tr>
        <tr>
            <td><?php echo smarty_function_form_input(array('name' => 'password','value' => "",'placeholder' => "最低8文字必要です",'class' => 'password'), $this);?>
<br><span><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</span></td>
        </tr>
        <tr>
            <td>もう一度パスワードを入力してください</td>
        </tr>
        <tr>
            <td><?php echo smarty_function_form_input(array('name' => 're_password','value' => "",'class' => 'password'), $this);?>
<br><span><?php echo smarty_function_message(array('name' => 're_password'), $this);?>
</span></td>
        </tr>
    </table>
    <p>
        <?php echo smarty_function_form_submit(array('value' => "アカウントを作成"), $this);?>

    </p>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </div>
</div>
</div>
