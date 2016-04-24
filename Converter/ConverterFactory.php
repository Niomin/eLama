<?php

namespace Converter;

use RuntimeException;

class ConverterFactory
{
    /** @var ConverterUsd */
    private $converterUsd;

    /** @var ConverterRub */
    private $converterRub;

    /**
     * @param $cur
     * @return IConverter
     */
    public function getConverter($cur)
    {
        switch ($cur) {
            case 'USD': return $this->getConverterUsd();
            case 'RUB': return $this->getConverterRub();
            default: throw new RuntimeException('Неизвестная валюта');
        }
    }

    private function getConverterUsd()
    {
        if (!$this->converterUsd) {
            $this->converterUsd = new ConverterUsd();
        }
        return $this->converterUsd;
    }

    private function getConverterRub()
    {
        if (!$this->converterRub) {
            $this->converterRub = new ConverterRub();
        }
        return $this->converterRub();
    }
}