<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-24
 * @version: 0.11
 * ©Copyright ${Time} Released under the MIT license
 * http://www.imisko.com/license
 *
 *  ===========================================================*/
define('APP_PATH',dirname(__FILE__));
define('LIBRARY_PATH',APP_PATH.'/application/library/');
$app  = new Yaf_Application(APP_PATH . "/conf/default.ini");
$app->bootstrap()->run();

?>