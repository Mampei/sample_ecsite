<?php
/**
 *  RegisterUser/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  registerUser_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_RegisterUserDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'user_name' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => '名前',
            'required'      => true,
            'max'           => 32,
            'filter'        => 'space_zentohan,ltrim,rtrim,ntrim',
        ],
        'user_kana' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => 'フリガナ',
            'required'      => true,
            'max'           => 32,
            'filter'        => 'space_zentohan,kana_hantozen,ltrim,rtrim,ntrim',
        ],
        'mailaddress' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_TEXT,
            'name'          => 'メールアドレス',
            'required'      => true,
            'max'           => 128,
            'filter'        => 'numeric_zentohan,alphabet_zentohan,ltrim,rtrim,ntrim',
            'custom'        => 'checkMailaddress',
        ],
        'password' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_PASSWORD,
            'name'          => 'パスワード',
            'required'      => true,
            'min'           => 8,
            'max'           => 64,
            'regexp'        => '/[a-zA-Z0-9!-\:-@¥[-`{-~]+$/',
        ],
        're_password' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_PASSWORD,
            'name'          => 'パスワード',
            'required'      => true,
            'custom'        => 'checkRepass',
        ],
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    protected function _filter_space_zentohan($value)
    {
        return mb_convert_kana($value, "s");
    }

    function checkRepass($name)
    {
        if(strcmp($this->form_vars[$name], $this->form_vars['password']) != 0){
            return $this->ae->add($name, "パスワードが一致しません", E_FORM_INVALIDVALUE);
        }
    }
}

/**
 *  registerUser_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_RegisterUserDo extends Sample_ActionClass
{
    /**
     *  preprocess of registerUser_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'registerUser';
        }
        return null;
    }

    /**
     *  registerUser_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB(); 
        $ur = new Sample_UserRegistry();

        // 各フォーム値
        $user_name = $this->af->get('user_name');
        $user_kana = $this->af->get('user_kana');
        $mailaddress = $this->af->get('mailaddress');
        $password = $this->af->get('password');
        
        // メールアドレス重複チェック
        $rs = $ur->checkDuplication($db, $mailaddress, 1);
        if (Ethna::isError($rs)) {
            $this->ae->addObject('mailaddress', $rs);
            return 'registerUser';
        }

        // パスワード重複チェック
        $rs = $ur->checkDuplication($db, $password, 2);
        if (Ethna::isError($rs)) {
            $this->ae->addObject('password', $rs);
            return 'registerUser';
        }

        // データベースに会員情報登録
        $user_id = $ur->storeUserData($db, $user_name, $user_kana, $mailaddress, $password);

        // セッションをスタート　＆ ユーザIDと名前をセット
        $this->session->start();
        $this->session->set('user_id', $user_id);
        $this->session->set('user_name', $user_name);

        return 'index';
    }
}
