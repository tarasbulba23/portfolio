<?php

ini_set('display_errors', 'off');

if (version_compare(phpversion(), '5.4.0', '<')) {
    die('Minimal required php version 5.4.0.');
}

if (!function_exists('finfo_open')) {
    die('PHP module fileinfo is required!');
}

if( !defined("FROM_SQL_ALL") ) exit(0);
define( "FROM_FUN_AJAX_ALL", true );
require_once(dirname(__FILE__) . '/func.php');