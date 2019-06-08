<?php /* Smarty version 2.6.31, created on 2019-06-02 21:23:14
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'login.tpl', 4, false),array('function', 'message', 'login.tpl', 6, false),array('function', 'form_input', 'login.tpl', 13, false),array('function', 'form_submit', 'login.tpl', 23, false),)), $this); ?>
<div class="login">
    <h1>ログイン</h1>
    <div class="container">
    <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'login_do')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <?php if ($this->_tpl_vars['app']['aError']): ?>
        <p class="auth"><?php echo smarty_function_message(array('name' => 'authError'), $this);?>
</p>
        <?php endif; ?>
        <table>
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
                <td><?php echo smarty_function_form_input(array('name' => 'password','class' => 'password'), $this);?>
<br><span><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</span></td>
            </tr>
        </table>
        <p>
            <?php echo smarty_function_form_submit(array('value' => "ログイン",'class' => 'submit'), $this);?>

        </p>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </div>
</div>