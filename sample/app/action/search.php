<?php
/**
 *  Search.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  search Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_Search extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
       /*
        *  TODO: Write form definition which this action uses.
        *  @see http://ethna.jp/ethna-document-dev_guide-form.html
        *
        *  Example(You can omit all elements except for "type" one) :
        *
        *  'sample' => array(
        *      // Form definition
        *      'type'        => VAR_TYPE_INT,    // Input type
        *      'form_type'   => FORM_TYPE_TEXT,  // Form type
        *      'name'        => 'Sample',        // Display name
        *
        *      //  Validator (executes Validator by written order.)
        *      'required'    => true,            // Required Option(true/false)
        *      'min'         => null,            // Minimum value
        *      'max'         => null,            // Maximum value
        *      'regexp'      => null,            // String by Regexp
        *
        *      //  Filter
        *      'filter'      => 'sample',        // Optional Input filter to convert input
        *      'custom'      => null,            // Optional method name which
        *                                        // is defined in this(parent) class.
        *  ),
        */
        'item_name' => [
            'type'          => VAR_TYPE_STRING,
            'name'          => '検索名',
        ],
        'start' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],

    );
}

/**
 *  search action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_Search extends Sample_ActionClass
{
    /**
     *  preprocess of search Action.
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
     *  search action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $is = new Sample_ItemSearch();

        // 表示する商品を検索 & セット
        $rs = $is->searchItem($db, $this->af->get('item_name'), 0);

        // 商品が見つからなかった場合
        if (Ethna::isError($rs)) {
            $this->ae->addObject('itemError', $rs);

            // set flag
            $this->af->setApp('Error', 1);
            return 'search';
        }

        // 各商品情報をセット
        $this->af->setApp('item', $rs);

        // 合計商品数
        $this->total = count($rs);
        // 6n個目の商品から表示
        $this->offset = $this->af->get('start') === null ? 0 : $this->af->get('start');
        // 1画面の表示商品数 & セット
        $this->count = 6;
        $this->af->setApp('count', $this->count);

        // ページャ作成
        $this->getPager();

        // delete flag
        $this->af->setApp('Error', 0);
        return 'search';
    }

    /**
    *
    * ページャの作成
    *
    * @access public
    * @return void
    */
    function getPager(){
        $pager = Ethna_Util::getDirectLinkList($this->total, $this->offset, $this->count);
        $next = $this->offset + $this->count;
        if($next < $this->total){
            $last = ceil($this->total / $this->count);
            $this->af->setApp('hasnext', true);
            $this->af->setApp('next', $next);
            $this->af->setApp('last', ($last * $this->count) - $this->count);
        }
        $prev = $this->offset - $this->count;
        if($this->offset - $this->count >= 0){
            $this->af->setApp('hasprev', true);
            $this->af->setApp('prev', $prev);
        }
        $this->af->setApp('current', $this->offset);
        $this->af->setApp('link', '?item_name='.$this->af->get('item_name').'&action_search=検索');
        $this->af->setApp('pager', $pager);
    }
}
