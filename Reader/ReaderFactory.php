<?php

namespace Reader;

use RuntimeException;
use SplFileObject;

class ReaderFactory
{
    /**
     * @param SplFileObject $file
     * @return IReader
     */
    public function createReader(SplFileObject $file)
    {
        switch ($file->getExtension()) {
            case 'csv':
                return new ReaderCsv($file);
            default:
                throw new RuntimeException('Неизвестный тип файла');
        }
    }
}