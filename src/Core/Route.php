<?php

namespace Core;

class Route {

    final public static function route()
    {
        if (isset($_GET['route'])) {

            $params = explode('/',$_GET['route']);
            $list   = ['main','user','product'];
    
            if (in_array($params[0] , $list)) {
                $file = "./src/Pages/{$params[0]}/{$params[0]}.php";
                if (is_readable($file)) {
                    $content = $file;
                } else {
                    $content = '404';
                }
            } else if ($params[0] == 'login'){
                $content = 'login';
            } else {
                $content = '404';
            }
            return $content;
        } else {
            return 'login';
        }
    }
}