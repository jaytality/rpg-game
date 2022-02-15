<?php
/**
 * Helper: Time
 *
 * A couple of helper functions for Time related functionality
 *
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 * @copyright 2020 Johnathan Tiong
 *
 */
namespace spark\Helpers;

/**
 * Time
 * Helper class to convert time strings, or confirm if a string is a timestamp
 */
class Time
{
    /**
     * niceOutput
     * Used as Time::niceOutput(1802340814) -- e.g. "3 hours ago" / OR / "in 3 days"
     *
     * @param integer $timestamp
     * @return string
     */
    public function niceOutput($timestamp)
    {
        $time = time() - $timestamp;

        $seconds      = time() - $timestamp;
        $minutes      = round((time() - $timestamp) / 60);
        $hours        = round((time() - $timestamp) / 3600);
        $days         = round((time() - $timestamp) / 86400);
        $weeks        = round((time() - $timestamp) / 604800);
        $months       = round((time() - $timestamp) / 2600640);
        $years        = round((time() - $timestamp) / 31207680);

        // if there's more than 0 = past time we're mentioning
        if ($time >= 0) {
            if ($seconds <= 60) {
                return "just now";
            } elseif ($minutes < 60) {
                return ($minutes == 1) ? "1 minute ago" : "$minutes minutes ago";
            } elseif ($hours < 24) {
                return ($hours == 1) ? "1 hour ago" : "$hours hours ago";
            } elseif ($days < 6) {
                return ($days == 1) ? "1 day ago" : "$days days ago";
            } elseif ($years >= 1) {
            	return date('d M y', $timestamp);
            } else {
            	return date('d M', $timestamp);
            }
        } else {
            $seconds      = abs($seconds);
            $minutes      = abs($minutes);
            $hours        = abs($hours);
            $days         = abs($days);
            $weeks        = abs($weeks);
            $months       = abs($months);
            $years        = abs($years);

            if ($seconds <= 60) {
                return "in a few seconds";
            } elseif ($minutes < 60) {
                return ($minutes == 1) ? "in a minute" : "in $minutes minutes";
            } elseif ($hours < 24) {
                return ($hours == 1) ? "in an hour" : "in $hours hours";
            } elseif ($days < 6) {
                return ($days == 1) ? "in a day" : "in $days days";
            } elseif ($weeks < 4) {
                return ($weeks == 1) ? "in a week" : "in $weeks weeks";
            } elseif ($months < 12) {
                return ($months == 1) ? "in a month" : "in $months months";
            } elseif ($years >= 1) {
                return "$years years";
            }
        }

        return null;
    }

    /**
     * isTimestamp
     * confirms if an integer is a timestamp or not
     *
     * @param integer $timestamp
     * @return boolean
     */
    public function isTimestamp($timestamp) {
        if(ctype_digit($timestamp) && strtotime(date('Y-m-d H:i:s', $timestamp)) === (int)$timestamp) {
            return true;
        } else {
            return false;
        }
    }
}
