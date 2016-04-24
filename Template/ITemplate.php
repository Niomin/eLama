<?php

namespace Template;

use Payment\Payment;

Interface ITemplate
{
    /**
     * @param Payment[] $payments
     */
    public function render(array $payments);
}