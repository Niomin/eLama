<?php

namespace Test;

use Reader\ReaderFactory;
use Test\Mock\CsvFileMock;

class ReaderTest implements ITest
{
    public function runTests()
    {
        $this->testSimpleRead();
    }

    protected function testSimpleRead()
    {
        $file = new CsvFileMock();
        $reader = (new ReaderFactory())->createReader($file);
        $data = $reader->fetch();
        if ($data !== ['a' => '1', 'b' => '2', 'c' => 'asd']) {
            throw new \Exception('Неверный перевод из csv');
        }
    }
}