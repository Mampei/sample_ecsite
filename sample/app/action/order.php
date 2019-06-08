<?php
/**
 *  Order.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  order Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_Order extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );

}

/**
 *  order action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_Order extends Sample_ActionClass
{
    /**
     *  preprocess of order Action.
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
     *  order action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $cm = new Sample_CartManager();
        $am = new Sample_AddressManager();
        $pc = new Sample_PaymentCalculator();

        // ユーザID
        $user_id = $this->session->get('user_id');

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

        // ユーザのカート情報をロード
        $cart_list = $cm->loadCart($db, $user_id);
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
}
