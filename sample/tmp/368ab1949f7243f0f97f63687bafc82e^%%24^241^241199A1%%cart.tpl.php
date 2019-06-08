<?php /* Smarty version 2.6.31, created on 2019-05-29 17:43:26
         compiled from cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'cart.tpl', 13, false),array('function', 'form_submit', 'cart.tpl', 15, false),array('function', 'form_input', 'cart.tpl', 21, false),)), $this); ?>
<h1>ショッピングカート</h1>


<div>
    <?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['app']['cart_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['show'] = true;
$this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
$this->_sections['index']['start'] = $this->_sections['index']['step'] > 0 ? 0 : $this->_sections['index']['loop']-1;
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = $this->_sections['index']['loop'];
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
        <a href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]; ?>
&item_name=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
">
            <img src="<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][4]; ?>
">
        </a>
        <p>
            <a href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]; ?>
&item_name=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
"><?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
</a>
        </p>
        <p>
            <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'cart_delete')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <input type="hidden" name="delete_item" value="<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]; ?>
" >
                <?php echo smarty_function_form_submit(array('value' => "削除"), $this);?>

            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </p>
        <p><span>¥ </span><?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][3]; ?>
</p>
        <p>
            <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'cart_quantity')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><br>
                <?php echo smarty_function_form_input(array('name' => 'purchase_quantity'), $this);?>

                <input type="hidden" name="update_item" value="<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]; ?>
" >
                <?php echo smarty_function_form_submit(array('value' => "変更"), $this);?>

            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </p>
    <?php endfor; endif; ?>
</div>

<div>
    <p>会計：<?php echo $this->_tpl_vars['app']['payment']; ?>
</p>
    <p>
        <a href="?action_order=true&user_id=<?php echo $_SESSION['user_id']; ?>
">レジに進む</a>
    </p>
</div>