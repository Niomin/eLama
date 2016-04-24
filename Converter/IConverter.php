<?php

namespace Converter;

use DateTime;

interface IConverter
{
    /**
     * @param float $sum
     * @param DateTime $date
     * @return float
     */
    public function convert($sum, DateTime $date);
}