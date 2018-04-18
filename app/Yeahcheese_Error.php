<?php
/**
 *  Yeahcheese_Error.php
 *
 *  @package   Yeahcheese
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
define('E_PASSWORD_COMPARISON', 300);
define('E_MAILADDRESS_REGISTERED', 301);
define('E_LOGIN_USER', 302);
define('E_DAY_EARLY', 303);
define('E_DAY_SAME', 304);
define('E_EVENT_DONTHAVE', 305);
define('E_EVENT_NOTFOUND', 306);
