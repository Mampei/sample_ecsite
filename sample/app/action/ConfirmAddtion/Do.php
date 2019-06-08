<?php
/**
 *  ConfirmAddtion/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  confirmAddtion_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ConfirmAddtionDo extends Sample_ActionForm
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
       /* 'quantity' => [
            'type'          => VAR_TYPE_INT,
            'form_type'     => FORM_TYPE_SELECT,
            'name'          => '購入数',
            'option'        => [ 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8', 9=>'9', 10=>'10',
                                 11=>'11', 12=>'12', 13=>'13', 14=>'14', 15=>'15', 16=>'16', 17=>'17', 18=>'18', 19=>'19', 20=>'20',
                                 21=>'21', 22=>'22', 23=>'23', 24=>'24', 25=>'25', 26=>'26', 27=>'27', 28=>'28', 29=>'29', 30=>'30'],
        ],
        'item_id' => [
            'type'          => VAR_TYPE_INT,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'item_name' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'list_price' => [
            'type'          => VAR_TYPE_INT,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],
        'image_url' => [
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
        ],*/

    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  confirmAddtion_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ConfirmAddtionDo extends Sample_ActionClass
{
    /**
     *  preprocess of confirmAddtion_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'error';
        }
        $sample = $this->af->get('sample');
        */
        return null;
    }

    /**
     *  confirmAddtion_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        /*$this->session->set('item_id_array', $this->af->get('item_id');
        $this->session->set('item_name_array', $this->af->get('item_name');
        $this->session->set('list_price_array', $this->af->get('list_price');
        $this->session->set('image_url_array', $this->af->get('image_url');*/


        return 'confirmAddtion';
    }
}
