<?php
/**
 *  ShowCart/UpdateQuantity.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  showCart_updateQuantity Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ShowCartUpdateQuantity extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'update_item' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'purchase_quantity' => [
            'type'          => VAR_TYPE_INT,
            'form_type'     => FORM_TYPE_SELECT,
            'name'          => '購入数',
            'option'        => [ 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8', 9=>'9', 10=>'10',
                                 11=>'11', 12=>'12', 13=>'13', 14=>'14', 15=>'15', 16=>'16', 17=>'17', 18=>'18', 19=>'19', 20=>'20',
                                 21=>'21', 22=>'22', 23=>'23', 24=>'24', 25=>'25', 26=>'26', 27=>'27', 28=>'28', 29=>'29', 30=>'30'],
        ],
    );
}

/**
 *  showCart_updateQuantity action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ShowCartUpdateQuantity extends Sample_ActionClass
{
    /**
     *  preprocess of showCart_updateQuantity Action.
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
     *  showCart_updateQuantity action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $cm = new Sample_CartManager();
        $cp = new Sample_PaymentCalculator();
        $sm = new Sample_StockManager();

        // ユーザID・商品ID・商品の購入数
        $user_id = $this->session->get('user_id');
        $item_id = $this->af->get('update_item');
        $purchase_quantity = $this->af->get('purchase_quantity');

        // 商品数の更新
        $cm->updateItemQuantity($db, $user_id, $item_id, $purchase_quantity );

        // カート情報の取得
        $cart_list = $cm->loadCart($db, $user_id);

        // 各商品の在庫数をセット
        foreach($cart_list as $item){
            $stock = $sm->loadStock($db, $item[1]);
            $stock_list[] = $stock;
        }
        $this->af->setApp("quantity", $stock_list);

        // 商品合計金額
        $payment =$cp->calculateTotalPayment($db, $user_id);

        // 商品と金額のセット
        $this->af->setApp('cart_list', $cart_list);
        $this->af->setApp('payment', number_format($payment) );

        return 'showCart';
    }
}
