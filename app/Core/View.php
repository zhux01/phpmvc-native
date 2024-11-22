<?php 
namespace Zhux\Core;
class View {
    public static function render($view, $data = []){
        require_once __DIR__ . '/../views/' . $view . '.php';
    }

}