<?php

use Test\ITest;

require_once 'config.php';

$tests = ['Test\\ReaderTest'];
$error = false;

foreach ($tests as $test) {
    try {
        /** @var ITest $test */
        $test = new $test;
        $test->runTests();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
        $error = true;
    }
}

if (!$error) {
    echo 'Завершено без ошибок!', PHP_EOL;
}