<?php /* Smarty version 2.6.31, created on 2019-06-08 09:49:49
         compiled from order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'order.tpl', 38, false),array('function', 'message', 'order.tpl', 41, false),array('function', 'form_submit', 'order.tpl', 54, false),array('block', 'form', 'order.tpl', 53, false),)), $this); ?>
    <div class="order">
        <h1>注文内容の確認・変更</h1>
        <div class="container">
        <div class="left">
            <div class="left_top">
                <table>
                    <tr>
                        <td><strong>お届け先住所</strong></td>
                    </tr>
                    <tr>
                        <td><?php echo $_SESSION['user_name']; ?>
</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_tpl_vars['app']['postal_code']; ?>
</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_tpl_vars['app']['xmpf']; ?>
 <?php echo $this->_tpl_vars['app']['address']; ?>
</td>
                    </tr>
                    <tr>
                        <td>電話番号：<?php echo $this->_tpl_vars['app']['phone_number']; ?>
</td>
                    </tr>
                </table>
            </div>

            <div class="left_bottom">
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
                <div class="item">
                    <div class="image">
                        <img src="<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][4]; ?>
">
                    </div>
                    <div class="detail">
                        <table>
                            <tr>
                                <td class="item_name"><?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][2]; ?>
</td>
                            </tr>
                            <tr>
                                <td>価格：¥ <?php echo ((is_array($_tmp=$this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][3])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                            </tr>
                            <tr>
                                <td>数量：<?php echo $this->_tpl_vars['app']['cart_list'][$this->_sections['index']['index']][5]; ?>
 <span><?php echo smarty_function_message(array('name' => "quantityError[".($this->_tpl_vars['count'])."]"), $this);?>
</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
                <?php endfor; endif; ?>
            </div>
        </div>

        <div class="right">
            <div class="btn">
                <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'order_do')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                    <?php echo smarty_function_form_submit(array('value' => "注文を確定する"), $this);?>

                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            </div>
            <div class="payment">
                <table>
                    <tr>
                        <td>注文内容</td>
                    </tr>
                    <tr>
                        <td>商品の小計：<span>¥ <?php echo $this->_tpl_vars['app']['payment']; ?>
</span></td>
                    </tr>
                    <tr>
                        <td>配送料・手数料：<span>¥ <?php echo $this->_tpl_vars['app']['deliveryFee']; ?>
</span>
                    </tr>
                </table>
            </div>
            <div class="totalPayment">
                <p><strong>ご請求額：¥ <?php echo $this->_tpl_vars['app']['totalPayment']; ?>
</strong><p>
            </div>
        </div>
        </div>
    </div>
