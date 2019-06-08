<?php
/**
 *  RegisterUser.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  registerUser Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_RegisterUser extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );
}

/**
 *  registerUser action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_RegisterUser extends Sample_ActionClass
{
    /**
     *  preprocess of registerUser Action.
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
     *  registerUser action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'registerUser';
    }
}
