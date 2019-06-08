<?php /* Smarty version 2.6.31, created on 2019-06-08 09:01:20
         compiled from confirmAddtion.tpl */ ?>
    <div class="confirmAddtion">
        <div class="image">
            <img src="<?php echo $this->_tpl_vars['form']['image_url']; ?>
">
            <p>追加されました</p>
        </div>
        <div class="payment">
            <p><span>小計：</span>¥ <?php echo $this->_tpl_vars['app']['payment']; ?>
</p>
        </div>
        <div class="btn">
            <ul>
                <li><a class="cart" href="?action_showCart=true">カートを編集</a></li>
                <?php if ($_SESSION['state'] == 1): ?>
                <li><a class="regi" href="?action_payment&user_id=<?php echo $_SESSION['user_id']; ?>
">レジに進む</a></li>
                <?php else: ?>
                <li><a class="regi" href="?action_registerAddress=true">レジに進む</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>



        
