<?php
define('PROJECT_DIR', __DIR__);
define('FILES_DIR', PROJECT_DIR . '/files');

spl_autoload_register(function($className) {
    $className = str_replace('\\', '/', $className);
    require_once PROJECT_DIR . '/' . $className . '.php';
});