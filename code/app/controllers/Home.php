<?php

// Controller: Home

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Core\Models\HomeModel as HomeModel;

use \R as R;

class Home extends Controller
{
    function getRequest()
    {
        /**
         * You can do view loading here - if you need to show a template
         */
		// $this->viewOpts['page']['content'] = 'home/index';
        // $this->view->load($this->viewOpts, $this->viewData);

        /**
         * API style response
         */
        $data = [
            'response' => 'Hello, human'
        ];

        echo json_encode($data);
        return;
        // end of API style response
    }

    function postRequest()
    {
        if (empty($_POST)) {
            echo "no data!";
            return;
        } else {
            // do something fancy
        }
    }

    function apiPostRequest()
    {
        // assign $data to the incoming POST data
        $data = json_decode(file_get_contents('php://input'), true);

        echo 'RECEIVED: ' . '<pre>' . print_r($data, true);
        return;
    }
}

