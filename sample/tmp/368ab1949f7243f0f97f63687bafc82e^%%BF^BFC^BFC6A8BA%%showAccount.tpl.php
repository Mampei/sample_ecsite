<?php /* Smarty version 2.6.31, created on 2019-06-08 08:10:24
         compiled from showAccount.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'showAccount.tpl', 10, false),array('function', 'form_submit', 'showAccount.tpl', 11, false),)), $this); ?>
<div class="showAccount">
    <h2>住所</h2>
    <div class="container">
        <p><?php echo $_SESSION['user_name']; ?>
</p>
        <p><?php echo $this->_tpl_vars['app']['postal_code']; ?>
</p>
        <p><?php echo $this->_tpl_vars['app']['xmpf']; ?>
</p>
        <p><?php echo $this->_tpl_vars['app']['address']; ?>
</p>
        <p><?php echo $this->_tpl_vars['app']['phone_number']; ?>
</p>
        <p>
        <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'showAccount_delete')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <?php echo smarty_function_form_submit(array('value' => "削除"), $this);?>

        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </p>
    </div>
</div>
