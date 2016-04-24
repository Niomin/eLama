<?php

namespace Converter;

use RuntimeException;

class ConverterFactory
{
    /** @var ConverterUsd */
    private $converterUsd;

    /** @var ConverterRub */
    private $converterRub;

    /** @var ConverterEur */
    private $converterEur;

    /**
     * @param $cur
     * @return IConverter
     */
    public function getConverter($cur)
    {
        switch (strtoupper($cur)) {
            case 'USD': return $this->getConverterUsd();
            case 'RUB': return $this->getConverterRub();
            case 'EUR': return $this->getConverterEur();
            default: throw new RuntimeException('Неизвестная валюта ' . $cur);
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
        return $this->converterRub;
    }

    private function getConverterEur()
    {
        if (!$this->converterEur) {
            $this->converterEur = new ConverterEur();
        }
        return $this->converterEur;
    }
}