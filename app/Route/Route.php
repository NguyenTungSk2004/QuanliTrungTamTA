<?php

class Route {
    private $routes = [];

    public function get($url, $controllerAction) {
        $url = '/QuanLiTrungTamTA' . $url;
        $this->routes[$url] = $controllerAction;
    }

    public function post($url, $controllerAction) {
        $url = '/QuanLiTrungTamTA' . $url;
        $this->routes[$url] = $controllerAction;
    }

    public function handle($requestUri) {
        $url = parse_url($requestUri, PHP_URL_PATH); // xóa phần http://example.com/
        if (isset($this->routes[$url])) {
            $controllerAction = $this->routes[$url];
            $parts = explode('@', $controllerAction); 
            
            $controllerName = $parts[0];
            $action = $parts[1];
            
            $controller = new $controllerName();
            $controller->$action();
        } else {
            echo '404 Not Found';
        }
    }
}

?>
