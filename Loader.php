<?php

use Reader\ReaderFactory;

class Loader
{
    /** @var ReaderFactory */
    private $readerFactory;

    /** @var SplFileInfo[] */
    private $directoryIterator;

    /** @var EventSaver */
    private $eventSaver;

    public function __construct(EventSaver $eventSaver)
    {
        $this->readerFactory = new ReaderFactory();
        $this->directoryIterator = new DirectoryIterator(FILES_DIR);
        $this->eventSaver = $eventSaver;
    }

    public function loadFiles()
    {
        foreach ($this->directoryIterator as $file) {
            if (!$file->isDir()) {
                $reader = $this->readerFactory->createReader($file->openFile());
                $this->eventSaver->processFile($reader);
            }
        }
    }
}