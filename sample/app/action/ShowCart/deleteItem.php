<?php
/**
 *  ShowCart/DeleteItem.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  showCart_deleteItem Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ShowCartDeleteItem extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'delete_item' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
    );

}

/**
 *  showCart_deleteItem action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ShowCartDeleteItem extends Sample_ActionClass
{
    /**
     *  preprocess of showCart_deleteItem Action.
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
     *  showCart_deleteItem action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $cm = new Sample_CartManager();
        $sm = new Sample_StockManager();
        $pc = new Sample_PaymentCalculator();

        // ユーザIDと削除する商品ID
        $user_id = $this->session->get('user_id');
        $delete_item = $this->af->get('delete_item');

        // 商品削除
        $cm->deleteCartItem($db, $user_id, $delete_item);

        // 削除後のカート情報を取得
        $cart_list = $cm->loadCart($db, $user_id );

        // 商品が無くなった場合
        if ( Ethna::isError($cart_list) ) {
            $this->ae->addObject('cartError', $cart_list);
            $this->af->setApp('nError', 1);
            return 'showCart';
        }

        // 各商品の在庫数をセット
        foreach($cart_list as $item){
            $stock = $sm->loadStock($db, $item[1]);
            $stock_list[] = $stock;
        }
        $this->af->setApp("quantity", $stock_list);

        // 商品の合計金額の算出
        $payment = $pc->calculateTotalPayment($db, $user_id );
        $this->af->setApp('payment', number_format($payment) );

        // カート情報のセット
        $this->af->setApp('cart_list', $cart_list);
        $this->af->setApp('nError', 0);

        return 'showCart';
    }
}
