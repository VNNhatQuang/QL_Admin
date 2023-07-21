<?php

function handleRoute($uri, $routes = []) {
    if($uri == "/index.php")
        header("Location: /");
    if (array_key_exists($uri, $routes)) {
        $controllerName = $routes[$uri][0];
        $method = $routes[$uri][1];
    
        require "app/controllers/$controllerName.php";
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            // Kiểm tra xem method action có tồn tại trong controller không
            if (method_exists($controller, $method)) {
                // Gọi hàm action
                call_user_func([$controller, $method]);
            } else
                throw new Exception("Method $method not found");
        } else {
            throw new Exception("Controller $controllerName not found");
        }
    } else {
        echo "<div style='height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column;'>
            <h2 style='color: red;'>Page Error</h2>
            <a href='/'>Quay lại Trang chủ</a>
        </div>";
    }
}