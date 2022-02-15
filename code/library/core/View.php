<?php

namespace spark\Core;

class View
{
    /**
     * load a view using specific view options and view data
     * @method load
     * @param  [type] $viewOpts [description]
     * @return [type]           [description]
     */
    function load($viewOpts = [], $viewData = [])
    {
        // assign data variables to easy named ones
        if (!empty($viewData)) {
            foreach ($viewData as $var => $value) {
                $$var = $value;
            }
        }

        if (isset($viewOpts['page']['layout'])) {
            include(views . '/_layouts/' . $viewOpts['page']['layout'] . '.php');
        } else {
            include(views . '/content/' . $viewOpts['page']['content'] . '.php');
        }
    }
}
