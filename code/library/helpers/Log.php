<?php
/**
 * Helper: Log
 *
 * Logging helper for spark Framework
 * Uses RedBeanPHP
 *
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 * @copyright 2020 Johnathan Tiong
 *
 */
namespace spark\Helpers;

use \R as R;

class Log
{
    public static function create($action)
    {
        $log = R::xdispense('logs');
        $log->time       = time();
        $log->action     = $action;
        $log->ip_address = isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];
        R::store($log);
    }
}
