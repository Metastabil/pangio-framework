<?php
namespace App\Controllers;

use System\Classes\Request;
use System\Classes\View;

/**
 * @author Julius Derigs
 * @version 1.1.0
 */

class BaseController {
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var View 
     */
    protected View $view;

    /**
     * Constructor
     */
    public function __construct() {
        $this->request = new Request();
        $this->view = new View();
    }

    /**
     * @return void
     */
    public function welcome() :void {
        $this->view->render('welcome');
    }
}