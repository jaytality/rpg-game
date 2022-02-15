<?php

namespace spark\Helpers;

use \R as R;

class Alert
{
    public static function create($style, $message)
    {
        $_SESSION['flash']['style'] = $style;
        $_SESSION['flash']['message'] = $message;
    }
}
