<?php
/**
 *  RegisterAddress.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  registerAddress Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_RegisterAddress extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
    );
}

/**
 *  registerAddress action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_RegisterAddress extends Sample_ActionClass
{
    /**
     *  preprocess of registerAddress Action.
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
     *  registerAddress action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'registerAddress';
    }
}
