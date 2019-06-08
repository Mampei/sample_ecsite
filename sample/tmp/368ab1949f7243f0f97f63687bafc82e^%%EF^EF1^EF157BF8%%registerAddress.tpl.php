<?php /* Smarty version 2.6.31, created on 2019-06-05 12:03:32
         compiled from registerAddress.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'registerAddress.tpl', 17, false),array('function', 'form_input', 'registerAddress.tpl', 36, false),array('function', 'form_submit', 'registerAddress.tpl', 57, false),array('block', 'form', 'registerAddress.tpl', 30, false),)), $this); ?>
    <?php if ($_SESSION['state'] == 0): ?>
    <div class="registerAddress">
        <div class="registerAddress_top">
            <h1>新しいお届け先を登録してください</h1>
            <p>必要事項を入力し、<span>「登録する」</span>ボタンをクリックしてください。</p>
            <p>※特殊文字は使用できません</p>
        </div>

        <?php if ($this->_tpl_vars['app']['nError'] > 0): ?>
        <div class="registerAddress_center">
            <p>エラーメッセージ</p>
            <ul>
                <?php if (is_error ( 'postal_code_former' ) || is_error ( 'postal_code_latter' )): ?>
                    <li>郵便番号には7けたの半角数字を入力してください</li>
                <?php endif; ?>
                <?php if (is_error ( 'xmpf' )): ?>
                    <li><?php echo smarty_function_message(array('name' => 'xmpf'), $this);?>
</li>
                <?php endif; ?>
                <?php if (is_error ( 'address' )): ?>
                    <li><?php echo smarty_function_message(array('name' => 'address'), $this);?>
</li>
                <?php endif; ?>
                <?php if (is_error ( 'phone_number' )): ?>
                    <li><?php echo smarty_function_message(array('name' => 'phone_number'), $this);?>
</li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="registerAddress_bottom">
            <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'registerAddress_do')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <table>
                <tr>
                    <td>郵便番号:</td>
                </tr>
                <tr>
                    <td><?php echo smarty_function_form_input(array('name' => 'postal_code_former','class' => 'postal_code_former'), $this);?>
-<?php echo smarty_function_form_input(array('name' => 'postal_code_latter','class' => 'postal_code_latter'), $this);?>
</td>
                </tr>
                <tr>
                    <td>都道府県:</td>
                </tr>
                <tr>
                    <td><?php echo smarty_function_form_input(array('name' => 'xmpf','class' => 'xmpf'), $this);?>
</td>
                </tr>
                <tr>
                    <td>住所:</td>
                </tr>
                <tr>
                    <td><?php echo smarty_function_form_input(array('name' => 'address','class' => 'address'), $this);?>
</td>
                </tr>
                <tr>
                    <td>電話番号:</td>
                </tr>
                <tr>
                    <td><?php echo smarty_function_form_input(array('name' => 'phone_number','class' => 'phone_number'), $this);?>
</td>
                </tr>
            </table>
            <p><?php echo smarty_function_form_submit(array('value' => "登録する",'class' => 'submit'), $this);?>
</p>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
    </div>
    <?php else: ?>
    <div>
        <p>登録が完了しました</p>
    </div>
    <?php endif; ?>
