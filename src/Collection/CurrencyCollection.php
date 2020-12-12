<?php

namespace EccKit\Money\Collection;

use EccKit\Money\Currency;

/**
 * Class CurrencyCollection.
 */
class CurrencyCollection extends Collection
{
    /**
     * Validate element.
     *
     * @param Currency $element Element
     *
     * @return bool
     */
    protected function validateElement($element): bool
    {
        if ($element instanceof Currency) {
            throw new ArgumentException(Currency::class);
        }
    }
}
