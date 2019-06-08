<?php /* Smarty version 2.6.31, created on 2019-06-08 08:54:27
         compiled from search/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'search/detail.tpl', 10, false),array('block', 'form', 'search/detail.tpl', 22, false),array('function', 'form_input', 'search/detail.tpl', 23, false),array('function', 'form_submit', 'search/detail.tpl', 28, false),array('function', 'message', 'search/detail.tpl', 31, false),)), $this); ?>
    <div class="search_detail">
        <div class="search_detail_left">
            <div class="image">
                <img src="<?php echo $this->_tpl_vars['app']['item'][0][9]; ?>
">
             </div>
            <div class="detail">
                <div class="name">
                    <strong><?php echo $this->_tpl_vars['app']['item'][0][1]; ?>
</strong>
                </div>
                <p class="price"><span>価格：</span>¥ <?php echo ((is_array($_tmp=$this->_tpl_vars['app']['item'][0][6])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
                <p class="stock"><span>残り：</span><?php echo $this->_tpl_vars['app']['stock']; ?>
個</p>
                <div class="description">
                    <p><?php echo $this->_tpl_vars['app']['item'][0][10]; ?>
</p>
                </div>
            </div>
        </div>

        <div class="search_detail_right">
            <p class="price"><span>¥ </span><?php echo ((is_array($_tmp=$this->_tpl_vars['app']['item'][0][6])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
            <p class="date"><strong><?php echo $this->_tpl_vars['app']['date']; ?>
</strong>にお届け予定です</p>
            <p>
            <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'confirmAddtion')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                数量：<?php echo smarty_function_form_input(array('name' => 'purchase_quantity'), $this);?>
<br>
                <?php echo smarty_function_form_input(array('name' => 'item_id','value' => $this->_tpl_vars['app']['item'][0][0]), $this);?>

                <?php echo smarty_function_form_input(array('name' => 'item_name','value' => $this->_tpl_vars['app']['item'][0][1]), $this);?>

                <?php echo smarty_function_form_input(array('name' => 'list_price','value' => $this->_tpl_vars['app']['item'][0][6]), $this);?>

                <?php echo smarty_function_form_input(array('name' => 'image_url','value' => $this->_tpl_vars['app']['item'][0][9]), $this);?>

                <?php echo smarty_function_form_submit(array('value' => "カートに入れる",'class' => 'cart'), $this);?>

            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            </p>
            <strong><?php echo smarty_function_message(array('name' => 'stockError'), $this);?>
</strong>
        </div>
    </div>