<?php

namespace Converter;

use DateTime;

class ConverterUsd implements IConverter
{
    /** @var DateTime */
    private $arcticFox;

    const MAGIC_CONST = 800;

    const MAGIC_RATIO = 35;

    public function __construct()
    {
        $this->arcticFox = new DateTime('2014-04-01');
    }

    public function convert($sum, DateTime $date)
    {
        return round($sum * $this->getRatio($date), 2);
    }

    private function getRatio(DateTime $date)
    {
        if ($date < $this->arcticFox) {
            return 35;
        }

        $daysCount = $this->arcticFox->diff($date)->days;

        return round(self::MAGIC_RATIO * (1 + $daysCount / self::MAGIC_CONST). 2);
    }

}