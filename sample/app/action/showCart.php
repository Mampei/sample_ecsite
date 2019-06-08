<?php
/**
 *  ShowCart.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  showCart Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ShowCart extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );
}

/**
 *  showCart action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ShowCart extends Sample_ActionClass
{
    /**
     *  preprocess of showCart Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        return null;
    }

    /**
     *  showCart action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $cm = new Sample_CartManager();
        $pc = new Sample_PaymentCalculator();
        $sm = new Sample_StockManager();

        // ユーザID
        $user_id = $this->session->get('user_id');

        // ユーザのカートテーブルがない場合にここで作っておく
        $cm->createCart($db, $user_id);

        // ユーザのカート情報を取得
        $cart_list = $cm->loadCart($db, $user_id );

        // カート情報が取得できない場合はエラー
        if ( Ethna::isError($cart_list) ) {
            $this->ae->addObject('cartError', $cart_list);

            // error yes flag
            $this->af->setApp('nError', 1);

            return 'showCart';
        }
        
        // カート情報をセット
        $this->af->setApp('cart_list', $cart_list);

        // 各商品の在庫数をセット
        foreach($cart_list as $item){
            $stock = $sm->loadStock($db, $item[1]);
            $stock_list[] = $stock;
        }
        $this->af->setApp("quantity", $stock_list);

        // 商品の合計金額の算出
        $payment = $pc->calculateTotalPayment($db, $user_id );
        $this->af->setApp('payment', number_format($payment) );

        // error no flag
        $this->af->setApp('nError', 0);

        return 'showCart';

    }
}
