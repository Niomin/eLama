<?php

namespace Test\Mock;

use SplFileObject;

class CsvFileMock extends SplFileObject
{
    private $first = true;

    public function __construct($file_name = __FILE__, $open_mode = 'r', $use_include_path = null, $context = null)
    {
        parent::__construct($file_name, $open_mode, $use_include_path, $context);
    }

    public function getExtension()
    {
        return 'csv';
    }

    public function fgetcsv($delimiter = ",", $enclosure = "\"", $escape = "\\")
    {
        if ($this->first) {
            $this->first = false;
            return ['a', 'b', 'c'];
        } else {
            return ['1', '2', 'asd'];
        }
    }
}