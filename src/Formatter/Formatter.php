<?php

namespace EccKit\Money\Formatter;

use EccKit\Money\Money;

/**
 * Interface Formatter.
 */
interface Formatter
{
    /**
     * Format.
     *
     * @param Money  $money  Money
     * @param string $format Format
     *
     * @return mixed
     */
    public function format(Money $money, string $format = ''): string;
}
