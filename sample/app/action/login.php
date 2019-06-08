<?php
/**
 *  Login.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  login Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_Login extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );
}

/**
 *  login action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_Login extends Sample_ActionClass
{
    /**
     *  preprocess of login Action.
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
     *  login action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'login';
    }
}
