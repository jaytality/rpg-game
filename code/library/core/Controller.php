<?php

namespace spark\Core;

class Controller
{
    protected $viewOpts = [];
    protected $viewData = [];
    protected $view;

    function __construct()
    {
        // default View Options
        $this->viewOpts['page']['layout']  = 'default';
        $this->viewOpts['page']['content'] = 'home/index';
        $this->viewOpts['page']['title']   = 'Welcome';

        $this->viewOpts['menu']['enabled'] = true;
        $this->viewOpts['menu']['content'] = 'main';
        $this->viewOpts['menu']['section'] = 'home';
        $this->viewOpts['menu']['style']   = 'solid';

        $this->viewOpts['sidebar']['enabled'] = false;
        $this->viewOpts['sidebar']['name']    = '';
        $this->viewOpts['sidebar']['content'] = '';
        $this->viewOpts['sidebar']['section'] = [];

        $this->viewOpts['breadcrumbs'] = [];

        $this->viewData = [];
        $this->view = new View();
    }
}
