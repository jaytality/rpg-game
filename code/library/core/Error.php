<?php

namespace spark\Core;

class Error
{
    function display($error)
    {
        $viewOpts = [];

        $viewOpts['page']['layout']  = 'default';
        $viewOpts['page']['content'] = 'error/' . $error;
        $viewOpts['page']['title']   = 'Error';
        $viewOpts['page']['logo']    = 'assets/img/header_logo.png';

        $viewOpts['menu']['enabled'] = true;
        $viewOpts['menu']['content'] = 'main';
        $viewOpts['menu']['section'] = 'home';

        switch ($error) {
            case '404':
                $viewOpts['page']['name']    = 'Error: ' . $error;
                $viewOpts['page']['byline']  = 'our development team has been notified of this error';
                break;

            case 'unauthorized':
                $viewOpts['page']['name']    = 'Error: Unauthorized';
                $viewOpts['page']['byline']  = 'our development team has been notified';
                break;
        }

        View::load($viewOpts, $viewData);

        die();
    }
}
