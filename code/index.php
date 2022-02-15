<?php

/**
 * @author Johnathan Tiong [j.tiong@eleague.gg]
 * @copyright 2016-09-01 eLeague Pty Ltd
 */

session_start();

// root constant
define('ROOT', dirname(__FILE__));

// file location constants
define('ctrlr', ROOT.'/app/controllers');
define('model', ROOT.'/app/models');
define('views', ROOT.'/app/views');

// autoload composer
require 'vendor/autoload.php';

// configuration and ORM
require ROOT.'/config.php';
require ROOT.'/R.php';

R::setup(getConfig('database.type').':host='.getConfig('database.host').';dbname='.getConfig('database.name'), getConfig('database.user'), getConfig('database.pass'));
R::ext('xdispense', function ($type) {
    return R::getRedBean()->dispense($type);
});
// echo R::testConnection() ? 'connected to the DB' : 'not connected to the DB'; die();

$base = new \spark\Core\Base();

// SETUP error logging
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('log_errors', 1);
ini_set('display_errors', 1);

// SITE TIMEZONE
date_default_timezone_set('Australia/Sydney');

include ROOT . '/bootstrap.php';
include ROOT . '/routing.php';

R::close();
