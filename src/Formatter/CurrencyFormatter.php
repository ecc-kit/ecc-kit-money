<?php

namespace EccKit\Money\Formatter;

use EccKit\Money\Money;

/**
 * Class CurrencyFormatter.
 */
class CurrencyFormatter implements Formatter
{
    /** Default format template */
    public const FORMAT = '%s%f';
    
    /**
     * Format.
     *
     * @param Money  $money  Money
     * @param string $format Format
     *
     * @return mixed
     */
    public function format(Money $money, string $format = self::FORMAT): string
    {
        $map = $this->getMap($money);
        
        return str_replace(
            array_keys($map),
            array_values($map),
            $format
        );
    }
    
    /**
     * Placeholders value map.
     *
     * @param Money $money Money
     *
     * @return array
     */
    protected function getMap(Money $money): array
    {
        return [
            '%s' => $money->getCurrency()->getSymbol(),
            '%f' => $money->getValue() / $money->getCurrency()->getDecimal(),
        ];
    }
}
