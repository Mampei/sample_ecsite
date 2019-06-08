<?php
/**
 *  Login/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  login_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_LoginDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'mailaddress' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => 'メールアドレス',
            'required'      => true,
            'custom'        => 'checkMailaddress',
            'default'       => '',
        ],
        'password' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_PASSWORD,
            'name'          => 'パスワード',
            'required'      => true,
            'regexp'        => '/^[a-zA-Z0-9!-\:-@¥[-`{-~]+$/',

        ],
    );

}

/**
 *  login_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_LoginDo extends Sample_ActionClass
{
    /**
     *  preprocess of login_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            // フォーム値エラーセット
            $this->af->setApp('fError', 1);

            return 'login';
        }
        return null;
    }

    /**
     *  login_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        $um = new Sample_UserManager();
        $ur = new Sample_UserRegistry();

        // メールアドレスとパスワード
        $mailaddress = $this->af->get('mailaddress');
        $password = $this->af->get('password');

        // ユーザ認証
        $user_data = $um->auth($db, $mailaddress, $password);

        // ユーザの認証
        if (Ethna::isError($user_data)) {
            $this->ae->addObject('authError', $user_data);
            
            // 認証エラーセット
            $this->af->setApp('aError', 1);

            return 'login';
        }

        // セッション開始
        $this->session->start();

        // ユーザIDと名前
        $user_id = $user_data[0][0];
        $user_name = $user_data[0][1];

        $this->session->set('user_id', $user_id);
        $this->session->set('user_name', $user_name);

        // ユーザのお届け先が既登録か調べるflagの取得
        $state = $ur->loadUserState( $db, $mailaddress);
        $this->session->set('state', $state);

        // 認証エラーの解除
        $this->af->setApp('fError', 0);
        $this->af->setApp('aError', 0);

        return 'index';
    }
}
