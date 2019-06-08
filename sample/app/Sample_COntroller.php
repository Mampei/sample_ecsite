<?php
/**
 *  Sample_Controller.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/** Application base directory */
define('BASE', dirname(dirname(__FILE__)));

/** include_path setting (adding "/app" and "/lib" directory to include_path) */
$app = BASE . "/app";
$lib = BASE . "/lib";
set_include_path(implode(PATH_SEPARATOR, array($app, $lib)) . PATH_SEPARATOR . get_include_path());

require_once BASE . '/vendor/autoload.php';
require_once 'Sample_Error.php';
require_once 'Sample_ActionClass.php';
require_once 'Sample_ActionForm.php';
require_once 'Sample_ViewClass.php';
require_once 'Sample_UrlHandler.php';
require_once 'adodb5/adodb.inc.php';
require_once 'Sample_UserRegistry.php';
require_once 'Sample_UserManager.php';
require_once 'Sample_ItemSearch.php';
require_once 'Sample_RemoveTopColumn.php';
require_once 'Sample_StockManager.php';
require_once 'Sample_DateCalculator.php';
require_once 'Sample_CartManager.php';
require_once 'Sample_PaymentCalculator.php';
require_once 'Sample_AddressManager.php';
require_once 'qdmail/qdmail.php';
require_once 'qdmail/qdsmtp.php';
//require 'Sample_Table.php';

//require_once 'Sample_PagerGenerator.php';

/**
 *  Sample application Controller definition.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Controller extends Ethna_Controller
{
    /**#@+
     *  @access protected
     */

    /**
     *  @var    string  Application ID(appid)
     */
    protected $appid = 'SAMPLE';

    /**
     *  @var    array   forward definition.
     */
    protected $forward = array(
        /*
         *  TODO: write forward definition here.
         *
         *  Example:
         *
         *  'index'         => array(
         *      'view_name' => 'Sample_View_Index',
         *  ),
         */
    );

    /**
     *  @var    array   action definition.
     */
    protected $action = array(
        /*
         *  TODO: write action definition here.
         *
         *  Example:
         *
         *  'index'     => array(
         *      'form_name' => 'Sample_Form_SomeAction',
         *      'form_path' => 'Some/Action.php',
         *      'class_name' => 'Sample_Action_SomeAction',
         *      'class_path' => 'Some/Action.php',
         *  ),
         */
    );

    /**
     *  @var    array       application directory.
     */
    protected $directory = array(
        'action'        => 'app/action',
        'action_cli'    => 'app/action_cli',
        'action_xmlrpc' => 'app/action_xmlrpc',
        'app'           => 'app',
        'plugin'        => 'app/plugin',
        'bin'           => 'bin',
        'etc'           => 'etc',
        'filter'        => 'app/filter',
        'locale'        => 'locale',
        'log'           => 'log',
        'plugins'       => array('app/plugin/Smarty'),
        'template'      => 'template',
        'template_c'    => 'tmp',
        'tmp'           => 'tmp',
        'view'          => 'app/view',
        'www'           => 'www',
        'test'          => 'app/test',
    );

    /**
     *  @var    array       database access definition.
     */
    protected $db = array(
        ''              => DB_TYPE_RW,
    );

    /**
     *  @var    array       extention(.php, etc) configuration.
     */
    protected $ext = array(
        'php'           => 'php',
        'tpl'           => 'tpl',
    );

    /**
     *  @var    array   class definition.
     */
    public $class = array(
        /*
         *  TODO: When you override Configuration class, Logger class,
         *        SQL class, don't forget to change definition as follows!
         */
        'class'         => 'Ethna_ClassFactory',
        'backend'       => 'Ethna_Backend',
        'config'        => 'Ethna_Config',
        'db'            => 'Ethna_DB_ADOdb',
        'error'         => 'Ethna_ActionError',
        'form'          => 'Sample_ActionForm',
        'i18n'          => 'Ethna_I18N',
        'logger'        => 'Ethna_Logger',
        'plugin'        => 'Ethna_Plugin',
        'session'       => 'Ethna_Session',
        'view'          => 'Sample_ViewClass',
        'renderer'      => 'Ethna_Renderer_Smarty',
        'url_handler'   => 'Sample_UrlHandler',
    );

    /**
     *  @var    array       filter definition.
     */
    protected $filter = array(
        /*
         *  TODO: when you use filter, write filter plugin name here.
         *  (If you specify class name, Ethna reads filter class in
         *   filter directory)
         *
         *  Example:
         *
         *  'ExecutionTime',
         */
    );

    /**#@-*/

    /**
     *  Get Default language and locale setting.
     *  If you want to change Ethna's output encoding, override this method.
     *
     *  @access protected
     *  @return array   locale name(e.x ja_JP, en_US .etc),
     *                  system encoding name,
     *                  client encoding name(= template encoding)
     *                  (locale name is "ll_cc" format. ll = language code. cc = country code.)
     */
    protected function _getDefaultLanguage()
    {
        return array('ja_JP', 'UTF-8', '{$client_enc}');
    }

    /**
     *  set Default Template Engine
     *
     *  @access protected
     *  @param  object  Ethna_Renderer
     *  @obsolete
     */
    protected function _setDefaultTemplateEngine($renderer)
    {
    }
}