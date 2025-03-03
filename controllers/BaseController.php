<?php
namespace App\Controllers;

use System\Classes\View;

class BaseController {
    protected View $view;

    public function __construct() {
        $this->view = new View();
    }
}