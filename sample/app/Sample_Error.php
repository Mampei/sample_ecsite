<?php
/**
 *  Sample_Error.php
 *
 *  @package   Sample
 *
 *  $Id: 0fa9f8016b6019fca765272649b7a2e774c43068 $
 */

/*--- Application Error Definition ---*/
/*
 *  TODO: Write application error definition here.
 *        Error codes 255 and below are reserved
 *        by Ethna, so use over 256 value for error code.
 *
 *  Example:
 *  define('E_LOGIN_INVALID', 256);
 */
$i = 300;
/** エラーコード: ユーザ認証エラー */
define('E_SAMPLE_AUTH', $i++);
define('E_SAMPLE_CDMAIL', $i++);
define('E_SAMPLE_CDPASS', $i++);
define('E_SAMPLE_SEARCH', $i++);
define('E_SAMPLE_CART', $i++);
define('E_SAMPLE_STOCK', $i++);
