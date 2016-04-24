<?php

namespace Test;

use Converter\ConverterRub;
use Converter\ConverterUsd;
use Converter\IConverter;
use DateTime;

class ConverterTest implements ITest
{
    public function runTests()
    {
        for ($i = 1; $i < 20; $i++) {
            $this->testMultiplyConverter(new ConverterUsd());
            $this->testMultiplyConverter(new ConverterRub());
        }
    }

    private function testMultiplyConverter(IConverter $converter)
    {
        $count = mt_rand(1, 200000) / 100;

        $amount15 = $converter->convert($count, new DateTime());
        $amount1 = $converter->convert(1, new DateTime());

        if (round($amount1 * $count, 2) != $amount15) {
            throw new \Exception(sprintf('Неверное умножение %.2f * %.2f != %.2f', $amount1, $count, $amount15));
        }
    }
}