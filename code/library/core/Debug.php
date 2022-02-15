<?php

namespace spark\Core;

use \R as R;

class Debug
{
    function output($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}
