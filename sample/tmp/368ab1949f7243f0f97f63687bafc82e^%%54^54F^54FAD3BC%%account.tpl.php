<?php /* Smarty version 2.6.31, created on 2019-05-29 12:33:16
         compiled from account.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'account.tpl', 20, false),array('function', 'form_input', 'account.tpl', 44, false),array('function', 'form_submit', 'account.tpl', 75, false),array('block', 'form', 'account.tpl', 37, false),)), $this); ?>
<?php if ($_SESSION['state'] == 0): ?>
<div>
    <h2>新しいお届け先を登録してください</h2>
    <p>必要事項を入力し、「登録する」ボタンをクリックしてください。</p><br>
    <p>※特殊文字は使用できません</p>
</div>

<?php if ($this->_tpl_vars['app']['nError'] > 0): ?>
<div>
    <tr>
        <td>エラーメッセージ<br></td>
    </tr>
    <?php if (is_error ( 'postal_code_former' ) || is_error ( 'postal_code_latter' )): ?>
    <tr>
        <td>郵便番号には7けたの半角数字を入力してください<br></td>
    </tr>
    <?php endif; ?>
    <?php if (is_error ( 'xmpf' )): ?>
    <tr>
        <td><?php echo smarty_function_message(array('name' => 'xmpf'), $this);?>
<br></td>
    </tr>
    <?php endif; ?>
    <?php if (is_error ( 'address' )): ?>
    <tr>
        <td><?php echo smarty_function_message(array('name' => 'address'), $this);?>
<br></td>
    </tr>
    <?php endif; ?>
    <?php if (is_error ( 'phone_number' )): ?>
    <tr>
        <td><?php echo smarty_function_message(array('name' => 'phone_number'), $this);?>
<br></td>
    </tr>
    <?php endif; ?>
</div>
<?php endif; ?>

<div>
    <?php $this->_tag_stack[] = array('form', array('ethna_action' => 'account_do')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <table>
        <tr>
            <td>郵便番号:</td>
        </tr>
        <tr>
            <td>
                <?php echo smarty_function_form_input(array('name' => 'postal_code_former'), $this);?>

                -
                <?php echo smarty_function_form_input(array('name' => 'postal_code_latter'), $this);?>

            </td>
        </tr>
        <tr>
            <td>都道府県:</td>
        </tr>
        <tr>
            <td>
                <?php echo smarty_function_form_input(array('name' => 'xmpf'), $this);?>

            </td>
        </tr>
        <tr>
            <td>住所:</td>
        </tr>
        <tr>
            <td>
                <?php echo smarty_function_form_input(array('name' => 'address'), $this);?>

            </td>
        </tr>
        <tr>
            <td>電話番号:</td>
        </tr>
        <tr>
            <td>
                <?php echo smarty_function_form_input(array('name' => 'phone_number'), $this);?>

            </td>
        </tr>
    </table>
    <p>
        <?php echo smarty_function_form_submit(array('value' => "変更"), $this);?>

    </p>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>
<?php else: ?>
<div>
    <p>登録が完了しました</p>
</div>
<?php endif; ?>
