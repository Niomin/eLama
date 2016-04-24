<?php

use Test\ITest;

require_once 'config.php';

/** @var ITest[] $tests */
$tests = [
    new Test\ReaderTest(),
    new Test\ConverterTest(),
    new Test\PeriodTest()
];

$error = false;

foreach ($tests as $test) {
    try {
        $test->runTests();
    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
        $error = true;
    }
}

if (!$error) {
    echo 'Завершено без ошибок!', PHP_EOL;
}