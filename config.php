<?php
define('PROJECT_DIR', __DIR__);

spl_autoload_register(function($className) {
    $className = str_replace('\\', '/', $className);
    require_once PROJECT_DIR . '/' . $className . '.php';
});