<?php
namespace System\Classes;

class View {
    public function render(string $view, array $params = []) :self {
        $viewDirectory = dirname(__DIR__, 2) . '/views';
        $viewPath = "$viewDirectory/$view.php";
        extract($params);

        ob_start();

        include $viewPath;

        echo ob_get_clean();

        return $this;
    }
}