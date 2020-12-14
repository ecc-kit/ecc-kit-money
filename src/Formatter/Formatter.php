<?php

namespace EccKit\Money\Formatter;

use EccKit\Money\Money;

/**
 * Abstract Class Formatter.
 */
abstract class Formatter
{
    /**
     * Format.
     *
     * @param Money  $money  Money
     * @param string $format Format
     *
     * @return mixed
     */
    abstract public function format(Money $money, string $format = ''): string;
}
