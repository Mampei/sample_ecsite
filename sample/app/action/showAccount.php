<?php
/**
 *  ShowAccount.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  showAccount Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ShowAccount extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );

}

/**
 *  showAccount action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ShowAccount extends Sample_ActionClass
{
    /**
     *  preprocess of showAccount Action.
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
     *  showAccount action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $am = new Sample_AddressManager();

        // ユーザーIDを取得
        $user_id = $this->session->get('user_id'); 

        // ユーザの郵便番号・都道府県・住所・電話番号を取得
        $user_data = $am->loadUserAddress($db, $user_id); 

        // $addressをセットする
        $postal_code = mb_substr( $user_data[0][0], 0, 2 )."-".mb_substr( $user_data[0][0], 3, 6 );
        $xmpf = $user_data[0][1];
        $address = $user_data[0][2];
        $phone_number = $user_data[0][3];

        $this->af->setApp( 'posta_code', $postal_code );
        $this->af->setApp( 'xmpf', $xmpf );
        $this->af->setApp( 'address', $address );
        $this->af->setApp( 'phone_number', $phone_number );

        return 'showAccount';
    }
}
