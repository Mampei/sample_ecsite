<?php
/**
 *  Order/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  order_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_OrderDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );

}

/**
 *  order_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_OrderDo extends Sample_ActionClass
{
    /**
     *  preprocess of order_do Action.
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
     *  order_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $cm = new Sample_CartManager();
        $sm = new Sample_StockManager();
        $am = new Sample_AddressManager();
        $pc = new Sample_PaymentCalculator();

        // ユーザIDの格納
        $user_id = $this->session->get('user_id');
        
        // カート商品を取得
        $cart_list = $cm->loadCart($db, $user_id);

        $i = 0;
        // 注文の際に在庫数を超えていないか調べる
        foreach($cart_list as $item){
            // 在庫があるか調べる
            $rs = $sm->checkStock($db, $item[1], $item[5]);
            // エラーの場合
            if(Ethna::isError($rs)){
                $error_flag = 1;
                $this->ae->addObject("quantityError[$i]", $rs);
            }
            $i++;
        }
        
        // エラーがある場合
        if ($error_flag ==1){
            // ユーザのお届け先情報をロード
            $address_data = $am->loadUserAddress($db, $user_id);

            // ユーザのお届け先情報
            $postal_code = mb_substr( $address_data[0][0], 0, 3 )."-".mb_substr( $address_data[0][0], 3, 6 );
            $xmpf = $address_data[0][1];
            $address = $address_data[0][2];
            $phone_number = $address_data[0][3];
    
            $this->af->setApp('postal_code', $postal_code);
            $this->af->setApp('xmpf', $xmpf);
            $this->af->setApp('address', $address);
            $this->af->setApp('phone_number', $phone_number);

            // ユーザのカート情報をセット
            $this->af->setApp('cart_list', $cart_list);

            // 商品の合計金額の算出
            $payment = $pc->calculateTotalPayment($db, $user_id);
            $this->af->setApp('payment', number_format($payment) );

            // 配達料・手数料（現在は¥320で固定）
            $this->af->setApp('deliveryFee', 320);
    
            // 商品と配達料の合計金額の算出
            $totalPayment = (int)$payment + 320;
            $this->af->setApp('totalPayment', number_format($totalPayment) );

            return 'order';
        }
        
        // 在庫数を変更
        foreach($cart_list as $item){
            $sm->updateStock($db, $item[1], $item[5]);
        }

        // カート削除
        $cm->deleteCart($db, $user_id);

        $error_flag = 0;
        return 'index';
    }
}
