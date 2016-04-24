<?php

namespace Reader;

use RuntimeException;
use SplFileObject;

class ReaderCsv implements IReader
{
    /** @var SplFileObject */
    private $file;

    /** @var array */
    private $headers;

    public function __construct(SplFileObject $file)
    {
        $this->file = $file;
    }

    public function fetch()
    {
        if (!$this->headers) {
            $this->open();
        }

        $data = $this->file->fgetcsv();

        if (!$data) {
            return false;
        }

        return array_combine($this->headers, $data);
    }

    private function open()
    {
        $this->headers = $this->file->fgetcsv();
        if (!$this->headers) {
            throw new RuntimeException('Не удалось прочитать файл ' . $this->file->getFilename());
        }
    }
}