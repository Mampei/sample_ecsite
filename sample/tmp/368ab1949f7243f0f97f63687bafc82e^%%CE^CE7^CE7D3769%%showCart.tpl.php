<?php /* Smarty version 2.6.31, created on 2019-06-08 09:39:23
         compiled from showCart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'showCart.tpl', 21, false),array('function', 'form_input', 'showCart.tpl', 22, false),array('function', 'form_submit', 'showCart.tpl', 23, false),array('function', 'message', 'showCart.tpl', 60, false),array('modifier', 'number_format', 'showCart.tpl', 30, false),)), $this); ?>
<?php if ($this->_tpl_vars['app']['nError'] == 0): ?>
<h1 class="showCart_h">ショッピングカート</h1>

<div class="showCart">
    <div class="showCart_left">
        <?php $this->assign('count', 0); ?>
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
            <div class="cart">
                <div class="item">
                    <div class="image">
                        <a href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]; ?>
&item_name=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
"><img src="<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][4]; ?>
"></a>
                    </div>
                    <div class="detail">
                        <div>
                            <strong>
                                <a href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]; ?>
&item_name=<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
"><?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
</a>
                            </strong>
                        </div>
                        <div>残り：<?php echo $this->_tpl_vars['app']['quantity'][$this->_tpl_vars['count']]; ?>
個</div>
                        <div class="delete">
                            <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'showCart_deleteItem')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                                <?php echo smarty_function_form_input(array('name' => 'delete_item','value' => $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]), $this);?>

                                <?php echo smarty_function_form_submit(array('value' => "削除"), $this);?>

                            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <div>価格：</div>  
                    <p>¥ <?php echo ((is_array($_tmp=$this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][3])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
                </div>
                <div class="quantity">
                    <div>数量：</div>
                    <div class="btn">
                        <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'showCart_updateQuantity')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><br>
                            <?php echo smarty_function_form_input(array('name' => 'purchase_quantity','default' => $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][5]), $this);?>

                            <?php echo smarty_function_form_input(array('name' => 'update_item','value' => $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][1]), $this);?>

                            <?php echo smarty_function_form_submit(array('value' => "変更"), $this);?>

                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    </div>
                </div>
            </div>
        <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
        <?php endfor; endif; ?>
    </div>

    <div class="showCart_right">
        <div class="container">
            <p class="payment">小計：¥ <?php echo $this->_tpl_vars['app']['payment']; ?>
</p>
            <?php if ($_SESSION['state'] == 1): ?>    
            <p><a class="btn" href="?action_order=true">レジに進む</a></p>
            <?php else: ?>
            <p><a class="btn" href="?action_registerAddress=true">レジに進む</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php else: ?>
<h1 class="showCart_h"><?php echo smarty_function_message(array('name' => 'cartError'), $this);?>
</h1>
<?php endif; ?>
