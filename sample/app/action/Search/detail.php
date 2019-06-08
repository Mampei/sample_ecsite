<?php
/**
 *  Search/Detail.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  search_detail Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_SearchDetail extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'item_id' => [
            'type'          => VAR_TYPE_STRING,
            'name'          => '商品の詳細',
        ],
    );
}

/**
 *  search_detail action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_SearchDetail extends Sample_ActionClass
{
    /**
     *  preprocess of search_detail Action.
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
     *  search_detail action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $is = new Sample_ItemSearch();
        $sm = new Sample_StockManager();
        $dc = new Sample_DateCalculator();

        // 商品ID
        $item_id = $this->af->get('item_id');

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
}
