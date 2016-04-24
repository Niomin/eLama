<?php

namespace Template;

use SplFileObject;

class TemplateCsv implements ITemplate
{
    public function render(array $payments)
    {
        $file = new SplFileObject('output.csv', 'w');
        
        $file->fputcsv(['partner', 'date', 'amount']);

        foreach ($payments as $payment) {
            $file->fputcsv($payment->toArray());
        }

        $file = null;
    }

}