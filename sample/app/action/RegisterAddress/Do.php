<?php
/**
 *  RegisterAddress/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  registerAddress_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_RegisterAddressDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'postal_code_former'   => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => '郵便番号',
            'required'      => true,
            'max'           => 3,
            'min'           => 3,
            'regexp'        => '/^[0-9]+$/',
            'filter'        => 'numeric_zentohan,ltrim,rtrim,ntrim',

        ],
        'postal_code_latter'   => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => '郵便番号',
            'required'      => true,
            'max'           => 4,
            'min'           => 4,
            'regexp'        => '/^[0-9]+$/',
            'filter'        => 'numeric_zentohan,ltrim,rtrim,ntrim',
        ],
        'xmpf' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_SELECT,
            'required'      => true,
            'custom'        => 'checkXmpf',
            'option'        => ['blank'      => '選択してください',
                                '北海道'     => '北海道',
                                '青森県'     => '青森県',
                                '岩手県'      => '岩手県',
                                '宮城県'     => '宮城県',
                                '秋田県'      => '秋田県',
                                '山形県'   => '山形県',
                                '福島県'  => '福島県',
                                '茨城県'    => '茨城県',
                                '栃木県'    => '栃木県',
                                '群馬県'      => '群馬県',
                                '埼玉県'    => '埼玉県',
                                '千葉県'      => '千葉県',
                                '東京都'      => '東京都',
                                '神奈川県'   => '神奈川県',
                                '山科県'  => '山梨県',
                                '長野県'     => '長野県',
                                '新潟県'     => '新潟県',
                                '富山県'     => '富山県',
                                '石川県'   => '石川県',
                                '福井県'      => '福井県',
                                '岐阜県'       => '岐阜県',
                                '静岡県'   => '静岡県',
                                '愛知県'      => '愛知県',
                                '三重県'        => '三重県',
                                '滋賀県'      => '滋賀県',
                                '京都府'     => '京都府',
                                '大阪府'      => '大阪府',
                                '兵庫県'      => '兵庫県',
                                '奈良県'       => '奈良県',
                                '和歌山県'   => '和歌山県',
                                '鳥取県'     => '鳥取県',
                                '島根県'    => '島根県',
                                '岡山県'    => '岡山県',
                                '広島県'  => '広島県',
                                '山口県'  => '山口県',
                                '徳島県'  => '徳島県',
                                '香川県'     => '香川県',
                                '愛媛県'      => '愛媛県',
                                '高知県'     => '高知県',
                                '福岡県'    => '福岡県',
                                '佐賀県'       => '佐賀県',
                                '長崎県'   => '長崎県',
                                '熊本県'   => '熊本県',
                                '大分県'       => '大分県',
                                '宮崎県'   => '宮崎県',
                                '鹿児島県'  => '鹿児島県',
                                '沖縄県'    => '沖縄県'
                                ]
        ],
        'address' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXTAREA,
            'name'          => '住所',
            'required'      => true,
            'regexp'      => '/^[\-0-9A-Za-zぁ-んァ-ヶー一-龠]+$/',
        ],
        'phone_number' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => '電話番号',
            'required'      => true,
            'regexp'        => '/^[0-9]+$/',
            'filter'        => 'numeric_zentohan,ltrim,rtrim,ntrim',
        ],

    );

    function checkXmpf($name)
    {   
        if ( $this->form_vars[$name] === "blank" ){
            $this->ae->add($name, "都道府県を正しく入力してください", E_FORM_CONFIRM );
        }
    }

}

/**
 *  registerAddress_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_RegisterAddressDo extends Sample_ActionClass
{
    /**
     *  preprocess of registerAddress_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            // エラー個数をセット
            $this->af->setApp('nError', $this->af->validate() );

            return 'registerAddress';
        }

        // エラー数　初期化
        $this->af->setApp('nError', 0);

        return null;
    }

    /**
     *  registerAddress_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $am = new Sample_AddressManager();

        // ユーザIDを取得
        $user_id = $this->session->get('user_id');

        // 各フォーム値を取得
        $postal_code = $this->af->get('postal_code_former').$this->af->get('postal_code_latter');
        $xmpf = $this->af->get('xmpf');
        $address = $this->af->get('address');
        $phone_number = $this->af->get('phone_number');

        // お届け先を登録
        $am->storeUserAddress($db, $user_id, $postal_code, $xmpf, $address, $phone_number, 1);

        // お届け先が既登録であるflagにセット
        $this->session->set('state', 1 );

        return 'registerAddress';

    }
}
