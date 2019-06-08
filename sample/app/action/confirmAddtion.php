<?php
/**
 *  ConfirmAddtion.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  confirmAddtion Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ConfirmAddtion extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'purchase_quantity' => [
            'type'          => VAR_TYPE_INT,
            'form_type'     => FORM_TYPE_SELECT,
            'name'          => '購入数',
            'option'        => [ 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8', 9=>'9', 10=>'10',
                                 11=>'11', 12=>'12', 13=>'13', 14=>'14', 15=>'15', 16=>'16', 17=>'17', 18=>'18', 19=>'19', 20=>'20',
                                 21=>'21', 22=>'22', 23=>'23', 24=>'24', 25=>'25', 26=>'26', 27=>'27', 28=>'28', 29=>'29', 30=>'30'],
        ],
        'item_id' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'item_name' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'list_price' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'image_url' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],

    );

}

/**
 *  confirmAddtion action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ConfirmAddtion extends Sample_ActionClass
{
    /**
     *  preprocess of confirmAddtion Action.
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
     *  confirmAddtion action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        // 未ログインであればログイン画面へ遷移
        if (!$this->session->isStart()) {
             return 'login';
        }

        $db = $this->backend->getDB();
        $cm = new Sample_CartManager();
        $pc = new Sample_PaymentCalculator();
        $sm = new Sample_StockManager();
        $is = new Sample_ItemSearch();
        $dc = new Sample_DateCalculator();

        // 商品情報
        $user_id = $this->session->get('user_id');
        $item_id = $this->af->get('item_id');
        $item_name = $this->af->get('item_name');
        $list_price = $this->af->get('list_price');
        $image_url = $this->af->get('image_url');
        $purchase_quantity = $this->af->get('purchase_quantity');

        // 在庫数が足りるか確認する
        $rs = $sm->checkStock($db, $item_id, $purchase_quantity);
        
        // 購入数が在庫数を超えている場合
        if(Ethna::isError($rs) ) {
            $this->ae->addObject('stockError', $rs);

            // 商品を検索
            $item = $is->searchItem($db, $item_id, 1);
            $this->af->setApp('item', $item);

            // 在庫数を取得
            $stock = $sm->loadStock($db, $item_id);
            $this->af->setApp('stock', $stock);

            // 配送時間を取得
            $stock = $sm->loadArrivalDate($db, $item_id);

            // お届け日を計算 & セット
            $date = $dc->addDate($stock);
            $this->af->setApp('date', $date);

            return 'search_detail';
        }

        // カート作成
        $cm->createCart($db, $user_id);

        // カートに商品情報を保存
        $cm->storeCart($db, $user_id, $item_id, $item_name, $list_price, $image_url);

        // 追加商品の個数を更新
        $cm->addItemQuantity($db, $user_id, $item_id, $purchase_quantity);

        // 追加分の金額を算出
        $payment = $pc->calculateEachPayment($db, $user_id, $item_id);
        $this->af->setApp('payment', number_format($payment) );

        return 'confirmAddtion';
    }
}
