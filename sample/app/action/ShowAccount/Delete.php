<?php
/**
 *  ShowAccount/Delete.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  showAccount_delete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ShowAccountDelete extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );

}

/**
 *  showAccount_delete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ShowAccountDelete extends Sample_ActionClass
{
    /**
     *  preprocess of showAccount_delete Action.
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
     *  showAccount_delete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $am = new Sample_AddressManager();

        // ユーザID取得
        $user_id = $this->session->get('user_id');

        // お届け先削除
        $am->deleteUserAddress($db, $user_id);

        // フラグセット
        $this->session->set('state', 0);

        return 'registerAddress';
    }
}
